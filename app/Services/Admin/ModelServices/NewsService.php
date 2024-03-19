<?php

namespace App\Services\Admin\ModelServices;

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
        $data = $dto->toArray();

        $data['user_name'] = Auth::user()['name'];

        $entity = $this->repository->create($data);

        $dto->main_image = $this->uploadImage($dto->main_image, $entity->id);

        $dto->content = $this->htmlParser($dto, $entity['id']);

        return $entity;
    }

    protected function uploadImage(mixed $image, string $id): string
    {
        if ($image !== null & !is_string($image)) {
            Storage::put('public\\image\\news\\' . $id, $image);
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
                $img->setAttribute('src', url('storage/image/news/' . $id) . '/' . $image_name);
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
                $data['main_image'] = $this->uploadImage($data['main_image'], $entity->id);
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
