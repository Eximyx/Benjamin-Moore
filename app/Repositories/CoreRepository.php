<?php
namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;


abstract class CoreRepository
{
    /**
     * 
     * @var Model
     */

    protected $model;
    protected $service;

    /**
     * CoreRepository Contstructor
     */

    public function __construct()
    {
        $this->service = app('App\Services\Service');
        $this->model = app($this->getModelClass());
    }

    /**
     * @return mixed
     */
    abstract protected function getModelClass();

    public function startConditions()
    {
        return clone $this->model;
    }


    public function getAllForDatatable()
    {
        $data = $this->getModelData();
        $selectable_key = null;

        if (isset($data['selectableModel'])) {
            $selectable_key = $this->service->getDataKeyForCombobox($data);
        }

        $query = $this->queryForDatatable($data, $selectable_key);

        $Entities = $this->startConditions()->join(...$query['join'])->select(...$query['select'])->get();

        return $Entities;
    }

    public function findById($id)
    {
        $entity = $this->model->find($id);
        return $entity;
    }

    public function updateOrCreate($request, $id = null)
    {


        $entity = $this->model->updateOrCreate([
            'id' => $id
        ], [
            ...$request
        ]);

        return $entity;
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
        return $query;

    }

    public function getModelData() {
        return $this->model->getModel();
    }

}

