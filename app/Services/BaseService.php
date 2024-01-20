<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use App\Services\DatatableService;

use Exception;

abstract class BaseService
{
    protected DatatableService $datatableService;
    protected $repository;
    public function __construct()
    {
        $this->datatableService = app(DatatableService::class);
    }

    public function showLatest($amount = null)
    {
        $entities = $this->repository->getLatest($amount);
        return $entities;
    }

    public function findBySlug($slug)
    {
        $entity = $this->repository->findBySlug($slug);
        return $entity;
    }

    public function showWithPaginate($amount = 1)
    {
        $entities = $this->repository->startConditions()->paginate($amount);
        return $entities;
    }
    public function ajaxDataTable()
    {
        $entities = $this->repository->getAllForDatatable();
        $table = $this->datatableService->createDatatable($entities);

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
        $variables['datatable_columns'] = $this->datatableService->getDatatableColumns($modelData);
        $variables['data'] = $modelData;

        return $variables;
    }

    public function findById($request)
    {
        $id = $request->validate(['id' => 'required'])['id'];
        $entity = $this->repository->findById($id);

        return $entity;
    }

    public function store($request)
    {
        $id = null;
        if (isset($request['id']) && $request['id'] !== null) {
            $id = $request['id'];
            unset($request['id']);
        }
        if (isset($request['main_image'])) {
            $request['main_image'] = $this->uploadImage($request['main_image']);
        }
        try {
            $data = $this->repository->updateOrCreate($request, $id);
        } catch (Exception $e) {
            if (isset($request['main_image']) && $request['main_image'] !== 'default_post.jpg') {
                $this->deleteImage($request['main_image']);
            }
            return $e;
        }

        return $data;
    }

    public function destroy($request)
    {
        $entity = $this->findById($request);
        if (isset($entity->main_image)) {
            $this->deleteImage($entity->main_iamge);
        }
        $entity->delete();
        return $entity;
    }

    public function toggle($request)
    {
        $entity = $this->findById($request);

        if (isset($entity->is_toggled)) {
            $entity['is_toggled'] = !$entity['is_toggled'];
            $entity->save();
            return $entity;
        } else {
            return 'This functiion is not allowed for this model!';
        }
    }

    protected function deleteImage($image)
    {
        if (!($image == 'default_post.jpg')) {
            Storage::delete('public/image/' . $image);
        }
        return true;
    }

    protected function uploadImage($image)
    {
        Storage::put('public\image', $image);
        $image = $image->hashName();
        return $image;
    }


    public function wrapper($items, $product_slide)
    {
        // $Entities = $items;
        $count = count($items);
        $j = 0;
        $List = [];
        for ($i = 0; $i < $count; $i++) {
            if ($i % $product_slide == 0 & $i !== 0) {
                $j++;
                $List[$j][] = $items[$i];
            } else {
                $List[$j][] = $items[$i];
            }
        }
        return $List;
    }


}