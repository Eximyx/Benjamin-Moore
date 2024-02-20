<?php

namespace App\Services;

use App\Contracts\BaseDTO;
use App\Repositories\CoreRepository;
use App\Traits\DataTableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

abstract class CoreService
{
    use DataTableTrait;

    public function __construct(
        protected CoreRepository $repository,
    )
    {
    }

    public function findById(string $id): ?Model
    {
        return $this->repository->findById($id);
    }

    public function create(BaseDTO $dto): ?Model
    {
        $data = (array)$dto;

        return $this->repository->create($data);
    }

    public function update(Model $entity, BaseDTO $dto): Model
    {
        $dto = (array)$dto;

        return $this->repository->update(
            $entity,
            $dto
        );
    }

    public function destroy(Request $request): ?Model
    {
        $entity = $this->findById($request['id']);

        return $entity;
    }
}
