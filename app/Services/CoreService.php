<?php

namespace App\Services;

use App\Contracts\BaseDTO;
use App\Repositories\CoreRepository;
use App\Traits\DataTableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
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
       $entity = $this->repository->findById($id);

       if($entity == null){
           throw new ModelNotFoundException('ds',500);

       }
       return $entity;
    }

    public function create(BaseDTO $dto): ?Model
    {
        $dto = (array)$dto;

        return $this->repository->create($dto);
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

        if ($entity !== null) {
            $this->repository->destroy($entity);
        }

        return $entity;
    }
}
