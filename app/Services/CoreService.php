<?php

namespace App\Services;

use App\Contracts\ModelDTO;
use App\Repositories\CoreRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

abstract class CoreService
{
    public function __construct(
        protected CoreRepository $repository,
    ) {
    }

    public function findById(string $id): ?Model
    {
        $entity = $this->repository->findById($id);

        if ($entity == null) {
            throw new ModelNotFoundException('ds', 500);
        }

        return $entity;
    }

    public function create(ModelDTO $dto): ?Model
    {
        $dto = (array) $dto;

        return $this->repository->create($dto);
    }

    public function update(Model $entity, ModelDTO $dto): Model
    {
        $dto = (array) $dto;

        return $this->repository->update(
            $entity,
            $dto
        );
    }

    public function destroy(Request $request): ?Model
    {
        $entity = $this->findById($request['id']);

        if ($entity !== null) {
            $this->repository->destroy($entity);
        }

        return $entity;
    }
}
