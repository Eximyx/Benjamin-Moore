<?php

/** @noinspection StaticInvocationViaThisInspection */

namespace App\Repositories;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class CoreRepository
{
    /**
     * @var Model|Application|\Illuminate\Foundation\Application|mixed
     */
    protected Model $model;

    public function __construct(
        ?string $modelClass
    )
    {
        $this->model = app($modelClass);
    }

    /**
     * @return string
     */
    public function getModelClass(): string
    {
        return $this->model::class;
    }

    /**
     * @return Model
     */
    public function startConditions(): Model
    {
        return clone $this->model;
    }

    /**
     * @return Collection<int,Model>
     */
    public function getAll(): Collection
    {
        return $this->model->all();
    }

    /**
     * @param string|int|null $id
     * @return Model
     */
    public function findById(string|int|null $id): Model
    {
        return $this->model::findOrFail($id);
    }

    /**
     * @param Model $entity
     * @return Model
     */
    public function save(Model $entity): Model
    {
        return tap($entity)->save();
    }

    /**
     * @param array<string,mixed> $data
     * @return Model
     */
    public function create(array $data): Model
    {

        return $this->model::create($data);
    }

    /**
     * @param array<string, mixed> $data
     * @return Model
     */
    public function update(Model $entity, array $data): Model
    {
        return tap($entity)->update($data);
    }

    /**
     * @param Model $entity
     * @return Model
     */
    public function destroy(Model $entity): Model
    {
        return tap($entity)->delete();
    }

    /**
     * @param string $key
     * @param string $type
     * @return Builder<Model>
     */
    public function getOrderedBy(string $key, string $type = "asc"): Builder
    {
        return $this->getBuilder()->orderBy($key, $type);
    }

    /**
     * @return Builder<Model>
     */
    public function getBuilder(): Builder
    {
        return $this->model::query();
    }

}
