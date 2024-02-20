<?php

namespace App\Services\ModelServices;

use App\Repositories\ModelRepositories\ReviewRepository;
use App\Contracts\BaseDTO;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReviewService extends BaseModelService
{
    public function __construct(ReviewRepository $repository)
    {
        parent::__construct($repository);
    }

    public function create(BaseDTO $dto): ?Model
    {
        $data = (array) $dto;

        $data['main_image'] = $this->uploadImage($data['main_image']);

        return $this->repository->create($data);
    }

    public function update(Model $entity, BaseDTO $dto): Model
    {
        $dto = (array) $dto;

        if ($dto['main_image'] !== null) {
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

        $this->deleteImage($entity->main_image);

        if ($entity !== null) {
            $this->repository->destroy($entity);
        }

        return $entity;
    }

    public function toggle(Request $request): ?Model
    {
        $entity = $this->findById($request['id']);

        $entity['is_toggled'] = ! $entity['is_toggled'];
        $entity = $this->repository->save($entity);

        return $entity;
    }

    protected function deleteImage(string $image): bool
    {
        if (! ($image === 'default_post.jpg')) {
            Storage::delete('public/image/'.$image);
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

