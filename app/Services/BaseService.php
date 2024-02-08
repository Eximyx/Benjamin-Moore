<?php

namespace App\Services;

use App\DataTransferObjects\BaseDTO;
use App\Repositories\CoreRepository;
use App\Traits\DataTableTrait;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;

abstract class BaseService
{
    use DataTableTrait;

    public function __construct(
        protected CoreRepository $repository,
    )
    {
    }

    public function showLatest(int $amount = null)
    {
        return $this->repository->getLatest($amount);
    }

    public function findBySlug($slug)
    {
        return $this->repository->findBySlug($slug);
    }

    public function showWithPaginate(int $amount = 1)
    {
        $entities = $this->repository->startConditions()->paginate($amount);

        return $entities;
    }

    public function ajaxDataTable(): JsonResponse
    {
        $entities = $this->repository->getAllForDatatable();
        return $this->createDatatable($entities)->make();
    }

    public function getAllSelectable(): Collection
    {
        return $this->repository->getAllSelectables();
    }

    public function getVariablesForDataTable()
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

    public function findById(string $id): Model
    {
        return $this->repository->findById($id);
    }

    public function create(BaseDTO $dto): Model
    {
        $data = (array)$dto;

        if (array_key_exists('main_image', $data)) {
            $data['main_image'] = $this->uploadImage($data['main_image']);
        }

        return $this->repository->create($data);
    }

    public function update(object $entity, BaseDTO $dto): Model
    {
        $dto = (array)$dto;

        if (isset($entity->main_image)) {
            if ($dto['main_image'] !== null) {
                $deleted = $this->deleteImage($entity->main_image);
                if ($deleted) {
                    $dto['main_image'] = $this->uploadImage($dto['main_image']);
                }
            } else {
                $dto['main_image'] = $entity->main_image;
            }
        }

        $entity = $this->repository->update(
            $entity,
            $dto
        );
        return $entity;
    }

    public function destroy($request): Model
    {
        $entity = $this->findById($request->id);

        if (isset($entity->main_image)) {
            $this->deleteImage($entity->main_image);
        }

        $this->repository->destroy($entity);

        return $entity;
    }

    public function toggle($request): Model
    {
        $entity = $this->findById($request->id);

        if (isset($entity->is_toggled)) {
            $entity['is_toggled'] = !$entity['is_toggled'];
            $entity = $this->repository->save($entity);
        }
        return $entity;
    }

    protected function deleteImage($image): bool
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
