<?php

namespace App\Services\ModelServices;

use App\Contracts\ModelDTO;
use App\Repositories\ModelRepositories\ProductRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

class ProductService extends BaseModelService
{
    public function __construct(ProductRepository $repository)
    {
        parent::__construct($repository);
    }

    /**
     * @return Collection<int, Model>
     */
    public function getLatest(): Collection
    {
        return $this->repository->getLatest()->get();
    }

    /**
     * @param int $categoryID
     * @return Collection<int, Model>
     */
    public function getSimilar(int $categoryID): Collection
    {
        return $this->repository->getSimilar($categoryID);
    }

    public function findBySlug(string $slug): ?Model
    {
        return $this->repository->findBySlug($slug);
    }

    public function create(ModelDTO $dto): ?Model
    {
        $data = (array)$dto;

        $data['main_image'] = $this->uploadImage($data['main_image']);

        return $this->repository->create($data);
    }

    public function update(Model $entity, ModelDTO $dto): Model
    {
        $dto = (array)$dto;

        if ($dto['main_image'] ?? null) {
            $deleted = $this->deleteImage($entity['main_image']);
            if ($deleted) {
                $dto['main_image'] = $this->uploadImage($dto['main_image']);
            }
        } else {
            $dto['main_image'] = $entity['main_image'];
        }

        return $this->repository->update(
            $entity,
            $dto
        );
    }

    public function destroy(Request $request): ?Model
    {
        $entity = $this->findById($request['id']);

        if ($entity ?? null) {
            if (isset($entity['main_image'])) {
                $this->deleteImage($entity['main_image']);
            }

            $this->repository->destroy($entity);
        }

        return $entity;
    }

    public function toggle(Request $request): ?Model
    {
        $entity = $this->findById($request['id']);

        $entity['is_toggled'] = !$entity['is_toggled'];

        return $this->repository->save($entity);
    }

    protected function deleteImage(string $image): bool
    {
        if (!($image === 'default_post.jpg')) {
            Storage::delete('public/image/' . $image);
        }

        return true;
    }

    protected function uploadImage(mixed $image): string
    {
        if ($image !== null) {
            Storage::put('public\image', $image);
            $image = $image->hashName();
        } else {
            $image = 'default_post.jpg';
        }

        return $image;
    }

    /**
     * @return array<string,mixed>
     */
    public function getVariablesForDataTable(): array
    {
        $variables = parent::getVariablesForDataTable();
        if (isset($variables['data']['selectableModel'])) {
            $variables['selectable'] = $variables['data']['selectableModel']->all();
        }

        return $variables;
    }
}
