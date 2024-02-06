<?php

namespace App\Repositories;

use App\DataTransferObjects\BaseDTO;
use Illuminate\Database\Eloquent\Model;

abstract class CoreRepository
{

    public function __construct(
        protected mixed $model
    ) {
        $this->model = app($model);
    }

    public function getModelClass()
    {
        return $this->model::class;
    }

    public function getModelData()
    {
        return config('getmodelconfig')[$this->getModelClass()];
    }

    public function startConditions()
    {
        return clone $this->model;
    }

    public function getAll()
    {
        $entities = $this->model->all();

        return $entities;
    }

    public function getLatest($amount = null)
    {
        $entities = $this->model->latest();

        if ($amount) {
            $entities = $entities->take($amount);
        }
        return $entities;
    }

    public function getAllSelectables()
    {
        $selectable = clone $this->getModelData()['selectableModel']->all();

        return $selectable;
    }

    public function getAllForDatatable()
    {
        // TODO RESOURCE 
        $data = $this->getModelData();
        $selectable_key = null;

        if (isset($data['selectableModel'])) {
            $selectable_key = $data['selectable_key'];
        }

        $query = $this->queryForDatatable($data, $selectable_key);

        $Entities = $this->startConditions();

        if (isset($query['join'])) {
            $Entities = $Entities->join(...$query['join']);
        }

        $Entities = $Entities->select(...$query['select'])->get();
        return $Entities;
    }

    public function findBySlug($slug)
    {
        $entity = $this->model->where("slug", $slug)->first();

        return $entity;
    }

    public function findById(string $id): Model
    {
        $entity = $this->model->find($id);

        return $entity;
    }

    public function save(object $entity)
    {
        $entity->save();
        return $entity;
    }
    public function create(mixed $data)
    {
        $entity = $this->model->create($data);
        return $entity;
    }

    public function update(Model $entity, array $dto)
    {
        return tap($entity)->update($dto);
    }


    public function destroy($entity)
    {
        $entity = $entity->delete();

        return $entity;
    }

    public function queryForDatatable($data, $selectable_key)
    {
        $query = [];
        $modelName = $this->model->getTable();

        $query['select'] = [$modelName . '.id'];

        foreach (array_keys($data['datatable_data']) as $item) {
            $query['select'][] = $modelName . '.' . $item;
        }

        if (isset($data['selectableModel'])) {
            $selectableModelName = $data['selectableModel']->getTable();

            $query['join'] = [
                $selectableModelName,
                $modelName . '.' . $selectable_key,
                '=',
                $selectableModelName . '.id'
            ];

            $query['select'][] = $selectableModelName . '.title as ' . $selectable_key;
        }

        $query['select'][] = $modelName . '.created_at';
        $query['select'][] = $modelName . '.updated_at';

        return $query;
    }
}
