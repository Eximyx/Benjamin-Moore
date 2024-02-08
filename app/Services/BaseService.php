<?php

namespace App\Services;

use App\Contracts\BaseDTO;
use App\Repositories\CoreRepository;
use App\Traits\DataTableTrait;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;

abstract class BaseService
{
    use DataTableTrait;

    public function __construct(
        protected CoreRepository $repository,
    )
    {
    }

    /**
     * @param int|null $amount
     * @return Builder<Model>
     */
    public function showLatest(int $amount = null): Builder
    {
        return $this->repository->getLatest($amount);
    }

    public function findBySlug(string $slug): Model|null
    {
        return $this->repository->findBySlug($slug);
    }

    /**
     * @param int $amount
     * @return LengthAwarePaginator<Model>
     */
    public function showWithPaginate(int $amount = 1): LengthAwarePaginator
    {
        return $this->repository->getModelClass()::paginate($amount);
    }

    /**
     * @throws Exception
     */
    public function ajaxDataTable(): JsonResponse
    {
        $entities = $this->repository->getAllForDatatable();
        return $this->createDatatable($entities)->make();
    }

    /**
     * @return Collection<int,Model>
     */
    public function getAllSelectable(): Collection
    {
        return $this->repository->getAllSelectables();
    }

    /**
     * @return array<string,mixed>
     */
    public function getVariablesForDataTable(): array
    {

        $modelData = $this->repository->modelData;

        $variables = [];

        if (isset($modelData['selectableModel'])) {
            $variables['selectable'] = $modelData['selectableModel']->all();
        }
        $variables['datatable_columns'] = $this->getDatatableColumns($modelData);
        $variables['data'] = $modelData;

        return $variables;
    }

    public function findById(string $id): Model|null
    {
        return $this->repository->findById($id);
    }

    public function create(BaseDTO $dto): Model|null
    {
        $data = (array)$dto;

        if (array_key_exists('main_image', $data)) {
            $data['main_image'] = $this->uploadImage($data['main_image']);
        }

        return $this->repository->create($data);
    }

    /**
     * @param Model|null $entity
     * @param BaseDTO $dto
     * @return Model
     */
    public function update(Model|null $entity, BaseDTO $dto): Model
    {
        $dto = (array)$dto;

        if (isset($entity['main_image'])) {
            if ($dto['main_image'] !== null) {
                $deleted = $this->deleteImage($entity['main_image']);
                if ($deleted) {
                    $dto['main_image'] = $this->uploadImage($dto['main_image']);
                }
            } else {
                $dto['main_image'] = $entity['main_image'];
            }
        }

        return $this->repository->update(
            entity: $entity,
            dto: $dto
        );
    }

    public function destroy(Request $request): Model|null
    {
        $entity = $this->findById($request['id']);

        if (isset($entity->main_image)) {
            $this->deleteImage($entity->main_image);
        }

        if ($entity !== null) {
            $this->repository->destroy($entity);
        }

        return $entity;
    }

    public function toggle(Request $request): Model|null
    {
        $entity = $this->findById($request['id']);

        if (isset($entity->is_toggled)) {
            $entity['is_toggled'] = !$entity['is_toggled'];
            $entity = $this->repository->save($entity);
        }
        return $entity;
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

}
