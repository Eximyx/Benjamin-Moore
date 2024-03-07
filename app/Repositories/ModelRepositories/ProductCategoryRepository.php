<?php

namespace App\Repositories\ModelRepositories;

use App\Models\ProductCategory as Model;
use Illuminate\Database\Eloquent\Collection;

class ProductCategoryRepository extends BaseModelRepository
{
    public function __construct()
    {
        parent::__construct(Model::class);
    }

    /**
     * @return Collection<int,\Illuminate\Database\Eloquent\Model>
     */
    public function getAllForDatatable(): Collection
    {
        $data = $this->modelData;

        $query = $this->queryForDatatable($data);

        $entities = $this->startConditions();

        $entities = $entities->join(...$query['join']);

        return $entities->select(...$query['select'])->get();
    }

    /**
     * @param  array<string,mixed>  $data
     * @return array<string,array<int,mixed>>
     */
    public function queryForDatatable(array $data): array
    {
        $query = parent::queryForDatatable($data);

        $selectableModelName = $data['selectableModel']->getTable();

        $query['join'] = [
            $selectableModelName,
            $this->model->getTable().'.'.$data['selectable_key'],
            '=',
            $selectableModelName.'.id',
            'left',
        ];

        $query['select'][] = $selectableModelName.'.title as '.$data['selectable_key'];

        return $query;
    }
}
