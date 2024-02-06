<?php

namespace App\Services;

use App\Repositories\CoreRepository;
use Illuminate\Support\Facades\Storage;
use App\Traits\DataTableTrait;
use App\DataTransferObjects\BaseDTO;

abstract class BaseService
{
    use DataTableTrait;
    public function __construct(
        protected $repository,
    ) {
    }

    public function showLatest(int $amount = null)
    {
        $entities = $this->repository->getLatest($amount);

        return $entities;
    }

    public function findBySlug($slug)
    {
        $entity = $this->repository->findBySlug($slug);

        return $entity;
    }

    public function showWithPaginate(int $amount = 1)
    {
        $entities = $this->repository->startConditions()->paginate($amount);

        return $entities;
    }

    public function ajaxDataTable()
    {
        $entities = $this->repository->getAllForDatatable();
        $table = $this->createDatatable($entities);

        return $table->make(true);
    }

    public function getAllSelectable()
    {
        $selectables = $this->repository->getAllSelectables();

        return $selectables;
    }

    public function getVariablesForDataTable()
    {

        $modelData = $this->repository->getModelData();

        $variables = [];

        if (isset($modelData['selectableModel'])) {
            $variables['selectable'] = $modelData['selectableModel']->all();
        }
        $variables['datatable_columns'] = $this->getDatatableColumns($modelData);
        $variables['data'] = $modelData;

        return $variables;
    }

    public function findById(string $id)
    {
        $entity = $this->repository->findById($id);

        return $entity;
    }

    public function create(BaseDTO $dto)
    {
        $data = (array) $dto;

        if (array_key_exists('main_image', $data)) {
            $data['main_image'] = $this->uploadImage($data['main_image']);
        }

        $entity = $this->repository->create($data);

        return $entity;
    }
    public function update(object $entity, BaseDTO $dto)
    {
        $dto = (array) $dto;
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

    public function destroy($request)
    {
        $entity = $this->findById($request->id);

        if (isset($entity->main_image)) {
            $this->deleteImage($entity->main_image);
        }

        $this->repository->destroy($entity);

        return $entity;
    }

    public function toggle($request)
    {
        $entity = $this->findById($request->id);

        if (isset($entity->is_toggled)) {
            $entity['is_toggled'] = !$entity['is_toggled'];
            $entity = $this->repository->save($entity);
            return $entity;
        }
    }

    protected function deleteImage($image)
    {
        if (!($image == 'default_post.jpg')) {
            Storage::delete('public/image/' . $image);
        }
        return true;
    }

    protected function uploadImage(mixed $image)
    {
        if ($image !== null) {
            Storage::put('public\image', $image);
            $image = $image->hashName();
        } else {
            $image = 'default_post.jpg';
        }

        return $image;
    }

    public function wrapper($items, int $slide)
    {
        $count = count($items);
        $j = 0;
        $List = [];
        for ($i = 0; $i < $count; $i++) {
            if ($i % $slide == 0 & $i !== 0) {
                $j++;
                $List[$j][] = $items[$i];
            } else {
                $List[$j][] = $items[$i];
            }
        }
        return $List;
    }
    public function showWrapper(int $slideCount)
    {
        $items = $this->repository->getLatest()->get();
        $wrappedItems = $this->wrapper($items, $slideCount);

        return $wrappedItems;
    }

}
