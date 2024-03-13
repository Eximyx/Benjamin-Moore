<?php

namespace App\Services\Admin\ModelServices;

use App\Contracts\ModelDTO;
use App\Repositories\ModelRepositories\NewsRepository;
use DOMDocument;
use File;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;

class NewsService extends BaseModelService
{
    public function __construct(
        NewsRepository $repository,
    )
    {
        parent::__construct($repository);
    }

    public function findBySlug(string $slug): Model
    {
        return $this->repository->findBySlug($slug);
    }

    public function create(ModelDTO $dto): Model
    {
        $dto->main_image = $this->uploadImage($dto->main_image);

        $data = $dto->toArray();

        $entity = $this->repository->create($data);

        $dto->content = $this->htmlParser($dto, $entity['id']);

        return $this->update($entity, $dto);
    }

    protected function uploadImage(mixed $image): string
    {
        if ($image !== null & !is_string($image)) {
            Storage::put('public\image', $image);
            $image = $image->hashName();
        } else {
            $image = 'default_post.jpg';
        }

        return $image;
    }

    public function htmlParser(ModelDTO $dto, int $id): string|false
    {

        $dom = new DOMDocument();
        $dom->loadHTML($dto->content, 9);

        $images = $dom->getElementsByTagName('img');

        foreach ($images as $key => $img) {
            if (str_starts_with($img->getAttribute('src'), 'data:image/')) {
                $data = base64_decode(explode(',', explode(';', $img->getAttribute('src'))[1])[1]);
                $path = public_path() . '/storage/' . 'image' . '/news/' . $id;
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

    public function update(Model $entity, ModelDTO $dto): Model
    {
        $data = $dto->toArray();

        if ($data['main_image']) {
            $deleted = $this->deleteImage($entity['main_image']);
            if ($deleted) {
                $data['main_image'] = $this->uploadImage($data['main_image']);
            }
        } else {
            $data['main_image'] = $entity['main_image'];
        }

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

    public function destroy(Request $request): Model
    {
        $entity = $this->findById($request['id']);

        $this->deleteImage($entity['main_image']);

        $this->repository->destroy($entity);

        return $entity;
    }

    public function toggle(Request $request): Model
    {
        $entity = $this->findById($request['id']);

        $entity['is_toggled'] = !$entity['is_toggled'];

        return $this->repository->save($entity);
    }

    /**
     * @return Builder<Model>
     */
    public function getLatest(?int $amount = null): Builder
    {
        return $this->repository->getLatest($amount);
    }

    /**
     * @return array<string, mixed>
     */
    public function getVariablesForDataTable(): array
    {
        $variables = parent::getVariablesForDataTable();
        if (isset($variables['data']['selectableModel'])) {
            $variables['selectable'] = $variables['data']['selectableModel']->all();
        }

        return $variables;
    }

    /**
     * @return LengthAwarePaginator<Model>
     */
    public function paginate(): LengthAwarePaginator
    {
        return $this->repository->paginate();
    }
}
