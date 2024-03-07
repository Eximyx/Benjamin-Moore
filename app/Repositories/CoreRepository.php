<?php

/** @noinspection StaticInvocationViaThisInspection */

namespace App\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class CoreRepository
{
    protected Model $model;

    public function __construct(
        ?string $modelClass
    )
    {
        $this->model = app($modelClass);
    }

    public function getModelClass(): string
    {
        return $this->model::class;
    }

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
     * @return Builder<Model>
     */
    public function getLatest(?int $amount = null): Builder
    {
        $entities = $this->model::latest();

        if ($amount) {
            $entities = $entities->take($amount);
        }

        return $entities;
    }

    public function findById(string $id): Model
    {
        return $this->model::findOrFail($id);
    }

    public function save(Model $entity): Model
    {
        return tap($entity)->save();
    }

    /**
     * @param array<string,mixed> $data
     */
    public function create(array $data): Model
    {
        return $this->model::create($data);
    }

    /**
     * @param array<string, mixed> $data
     */
    public function update(Model $entity, array $data): Model
    {
        return tap($entity)->update($data);
    }

    public function destroy(Model $entity): Model
    {
        return tap($entity)->delete();
    }
}
