<?php

namespace App\Services\Admin\ModelServices;

use _PHPStan_11268e5ee\Nette\Neon\Exception;
use App\Contracts\ModelDTO;
use App\Repositories\ModelRepositories\NewsRepository;
use DOMDocument;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class NewsService extends BaseModelService
{
    /**
     * @param NewsRepository $repository
     */
    public function __construct(
        NewsRepository $repository,
    )
    {
        parent::__construct($repository);
    }

    /**
     * @param string $slug
     * @return Model
     */
    public function findBySlug(string $slug): Model
    {
        return $this->repository->findBySlug($slug);
    }

    /**
     * @param ModelDTO $dto
     * @return Model
     */
    public function create(ModelDTO $dto): Model
    {
        $data = $dto->toArray();

        $data['user_name'] = Auth::user()['name'];

        $entity = $this->repository->create($data);

        $entity['main_image'] = $this->uploadImage($data['main_image'], $entity['id']);

        $entity['content'] = $this->htmlParser($dto, $entity['id']);

        $this->repository->save($entity);

        return $entity;
    }

    /**
     * @param mixed $image
     * @param string $id
     * @return string
     */
    protected function uploadImage(mixed $image, string $id): string
    {
        $path = 'image/news/' . $id . '/';

        if ($image !== null & !is_string($image)) {
            Storage::put('public/' . $path, $image);
            $image = 'storage/' . $path . $image->hashName();
        } else {
            $image = 'default_post.jpg';
        }

        return $image;
    }

    /**
     * @param ModelDTO $dto
     * @param int $id
     * @return string|false
     */
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
                $img->setAttribute('src', url('storage/image/news/' . $id) . '/' . $image_name);
            }
        }

        return $dom->saveHTML();
    }

    /**
     * @param Model $entity
     * @param ModelDTO $dto
     * @return Model
     */
    public function update(Model $entity, ModelDTO $dto): Model
    {
        $data = $dto->toArray();

        if ($data['main_image']) {
            $deleted = $this->deleteImage($entity['main_image']);
            
            if ($deleted) {
                $data['main_image'] = $this->uploadImage($data['main_image'], $entity['id']);
            }
        } else {
            $data['main_image'] = $entity['main_image'];
        }

        return $this->repository->update(
            $entity,
            $data
        );
    }

    /**
     * @param string $image
     * @return bool
     */
    public function deleteImage(string $image): bool
    {
        if (!($image === 'default_post.jpg')) {
            Storage::delete(str_replace("storage/", "public/", $image));
        }

        return true;
    }

    /**
     * @param Request $request
     * @return Model
     */
    public function toggle(Request $request): Model
    {
        $entity = $this->findById($request['id']);

        $entity['is_toggled'] = !$entity['is_toggled'];

        return $this->repository->save($entity);
    }

    /**
     * @param int|null $amount
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
