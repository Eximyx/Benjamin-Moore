<?php

namespace App\Repositories\ModelRepositories;

use App\Repositories\CoreRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class BaseModelRepository extends CoreRepository
{
    /**
     * @var array<string,mixed>
     */
    protected array $modelData;

    public function __construct(?string $modelClass)
    {
        parent::__construct($modelClass);
        $this->modelData = ((array) config('getmodelconfig'))[$modelClass];
    }

    /**
     * @return array<string,mixed>
     */
    public function getModelData(): array
    {
        return $this->modelData;
    }

    /**
     * @return Collection<int,Model>
     */
    public function getAllSelectables(): Collection
    {
        return $this->modelData['selectableModel']->all();
    }

    /**
     * @return Collection<int,Model>
     */
    public function getAllForDatatable(): Collection
    {
        $data = $this->modelData;

        $selectable_key = null;

        if (isset($data['selectableModel'])) {
            $selectable_key = $data['selectable_key'];
        }

        $query = $this->queryForDatatable($data, $selectable_key);

        $entities = $this->startConditions();

        if (isset($query['join'])) {
            $entities = $entities->join(...$query['join']);
        }

        return $entities->select(...$query['select'])->get();
    }

    /**
     * @param  array<string,mixed>  $data
     * @return array<string,array<int,mixed>>
     */
    public function queryForDatatable(array $data, mixed $selectable_key): array
    {
        $query = [];
        $modelName = $this->model->getTable();

        $query['select'] = [$modelName.'.id'];

        foreach ($data['datatable_data'] as $item) {
            $query['select'][] = $modelName.'.'.$item;
        }

        if (isset($data['selectableModel'])) {
            $selectableModelName = $data['selectableModel']->getTable();

            $query['join'] = [
                $selectableModelName,
                $modelName.'.'.$selectable_key,
                '=',
                $selectableModelName.'.id',
            ];

            $query['select'][] = $selectableModelName.'.title as '.$selectable_key;
        }

        $query['select'][] = $modelName.'.created_at';
        $query['select'][] = $modelName.'.updated_at';

        return $query;
    }
}
