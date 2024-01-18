<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Exception;

class BaseService
{
    protected $repository;
    
    public function getAllDataForDatatable()
    {
        $Entities = $this->repository->getAllForDatatable();
        return $Entities;
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

        if ($request['id'] !== null) {
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

}