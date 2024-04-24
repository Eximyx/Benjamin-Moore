<?php

namespace App\Services;

use App\Contracts\ModelDTO;
use App\Repositories\CoreRepository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

abstract class CoreService
{
    public function __construct(
        protected CoreRepository $repository,
    )
    {
    }

    /**
     * @param ModelDTO $dto
     * @return Model
     */
    public function create(ModelDTO $dto): Model
    {
        $dto = $dto->toArray();

        return $this->repository->create($dto);
    }

    /**
     * @param Model $entity
     * @param ModelDTO $dto
     * @return Model
     */
    public function update(Model $entity, ModelDTO $dto): Model
    {
        $dto = $dto->toArray();

        return $this->repository->update(
            $entity,
            $dto
        );
    }

    /**
     * @param Request $request
     * @return Model
     */
    public function destroy(Request $request): Model
    {
        $entity = $this->findById($request['id']);

        $this->repository->destroy($entity);

        return $entity;
    }

    /**
     * @param string $id
     * @return Model
     */
    public function findById(string $id): Model
    {
        return $this->repository->findById($id);
    }

    /**
     * @param string $key
     * @param string $type
     * @return Builder<Model>
     */
    public function getOrderedBy(string $key, string $type = "asc"): Builder
    {
        return $this->repository->getOrderedBy($key, $type);
    }
}
