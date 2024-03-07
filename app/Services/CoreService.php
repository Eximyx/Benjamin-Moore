<?php

namespace App\Services;

use App\Contracts\ModelDTO;
use App\Repositories\CoreRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

abstract class CoreService
{
    public function __construct(
        protected CoreRepository $repository,
    ) {
    }

    public function create(ModelDTO $dto): Model
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

    public function destroy(Request $request): Model
    {
        $entity = $this->findById($request['id']);

        $this->repository->destroy($entity);

        return $entity;
    }

    public function findById(string $id): Model
    {
        return $this->repository->findById($id);
    }
}
