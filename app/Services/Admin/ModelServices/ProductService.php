<?php

namespace App\Services\Admin\ModelServices;

use App\Contracts\ModelDTO;
use App\Http\Requests\ProductFilterRequest;
use App\Repositories\ModelRepositories\ColorProductRepository;
use App\Repositories\ModelRepositories\ColorRepository;
use App\Repositories\ModelRepositories\ProductCategoryRepository;
use App\Repositories\ModelRepositories\ProductRepository;
use DOMDocument;
use File;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;

class ProductService extends BaseModelService
{
    public function __construct(
        ProductRepository                   $repository,
        protected ColorProductRepository    $colorProductRepository,
        protected ProductCategoryRepository $productCategoryRepository,
        protected ColorRepository           $colorRepository,
    )
    {
        parent::__construct($repository);
    }

    /**
     * @return Collection<int, Model>
     */
    public function getProductCategories(): Collection
    {
        return $this->productCategoryRepository->getLatest()->get();
    }

    /**
     * @return Collection<int, Model>
     */
    public function getLatest(): Collection
    {
        return $this->repository->getLatest()->get();
    }

    /**
     * @return LengthAwarePaginator<Model>
     */
    public function getLatestPaginated(): LengthAwarePaginator
    {
        return $this->repository->getLatest()->paginate(12);
    }

    /**
     * @return Collection<int, Model>
     */
    public function getSimilar(int $categoryID): Collection
    {
        return $this->repository->getSimilar($categoryID);
    }

    public function findBySlug(string $slug): Model
    {
        return $this->repository->findBySlug($slug);
    }

    public function createSubImages(Model $entity, ?array $images): void
    {
        foreach ($images as $image) {
            $entity->images()->create(
                [
                    'product_id' => $entity->id,
                    'url' => $image,
                ]
            );
        }

    }

    public function create(ModelDTO $dto): Model
    {
        $data = $dto->toArray();

        unset($data['colors']);

        $entity = $this->repository->create($data);

//        $dto->sub_images = $this->MassUploadImage($dto->sub_images, $entity->id);

        $entity->main_image = $this->uploadImage($dto->main_image, $entity->id);

        $entity->save();

//        $this->createSubImages($entity, $dto->sub_images);

        $entity->colors()->attach($dto->colors);

        return $entity;
    }

    protected function uploadImage(mixed $image, string $id): string
    {
        if ($image !== null & !is_string($image)) {
            Storage::put('public\\image\\products\\' . $id, $image);
            $image = 'storage\\image\\products\\' . $id . '\\' . $image->hashName();
        } else {
            $image = 'default_post.jpg';
        }

        return $image;
    }

    public function update(Model $entity, ModelDTO $dto): Model
    {
        $data = $dto->toArray();

        if ($data['main_image']) {
            $deleted = $this->deleteImage($entity['main_image']);
            if ($deleted) {
                $data['main_image'] = $this->uploadImage($data['main_image'], $entity->id);
            }
        } else {
            $data['main_image'] = $entity['main_image'];
        }

        $data['content'] = $this->htmlParser($dto, $entity['id']);

        $entity->colors()->sync($data['colors']);

        unset($data['colors']);

        return $this->repository->update(
            $entity,
            $data
        );
    }

    protected function deleteImage(string $image): bool
    {
        if (!($image === 'default_post.jpg')) {
            Storage::delete('public/image/' . $image);
        }

        return true;
    }

    public function htmlParser(ModelDTO $dto, int $id): string|false
    {

        $dom = new DOMDocument();
        $dom->loadHTML($dto->content, 9);

        $images = $dom->getElementsByTagName('img');

        foreach ($images as $key => $img) {
            if (str_starts_with($img->getAttribute('src'), 'data:image/')) {
                $data = base64_decode(explode(',', explode(';', $img->getAttribute('src'))[1])[1]);
                $path = public_path() . '/storage/' . 'image' . '/products/' . $id;
                if (!File::isDirectory($path)) {
                    File::makeDirectory($path, 0777, true, true);
                }
                $image_name = time() . $key . '.png';
                file_put_contents($path . '/' . $image_name, $data);

                $img->removeAttribute('src');
                $img->setAttribute('src', url('storage/image/products/' . $id) . '/' . $image_name);
            }
        }

        return $dom->saveHTML();
    }

    public function destroy(Request $request): Model
    {
        $entity = parent::destroy($request);

        if (isset($entity['main_image'])) {
            $this->deleteImage($entity['main_image']);
        }

        return $entity;
    }

    public function toggle(Request $request): Model
    {
        $entity = $this->findById($request['id']);

        $entity['is_toggled'] = !$entity['is_toggled'];

        return $this->repository->save($entity);
    }

    public function findById(string $id): Model
    {
        return $this->repository->findById($id);
    }

    /**
     * @return array<string,mixed>
     */
    public function getVariablesForDataTable(): array
    {
        $variables = parent::getVariablesForDataTable();

        $variables['selectable'] = $variables['data']['selectableModel']->all();

        //        $variables['tags'] = $variables['data']['tagsModel'];

        $variables['tags'] = $variables['data']['tagsModel']->all();

        return $variables;
    }

    public function fetchProducts(ProductFilterRequest $request): array
    {
        $list['categories'] = $this->repository->fetchCategories($request);

        $list['products'] = $this->repository->fetchProducts($request)->paginate(12);

        return $list;

    }

    /**
     * @return Collection<int, Model>
     */
    public function getColors(): Collection
    {
        return $this->colorRepository->getAll();
    }

    protected function MassUploadImage(mixed $images, string $id): array
    {
        for ($i = 0; $i < count($images); $i++) {
            if ($images[$i] !== null & !is_string($images[$i])) {
                Storage::put('public\\image\\products\\' . $id . '\\sub_images\\' . $i . '.jpg', file_get_contents($images[$i]));
                $images[$i] = 'storage\\image\\products\\' . $id . '\\sub_images\\' . $i . '.jpg';
            }
        }
        return $images;
    }
}
