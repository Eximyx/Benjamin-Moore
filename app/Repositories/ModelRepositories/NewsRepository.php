<?php

namespace App\Repositories\ModelRepositories;

use App\Models\NewsPost;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class NewsRepository extends BaseModelRepository
{
    public function __construct()
    {
        parent::__construct(NewsPost::class);
    }

    /**
     * @return Collection<int,Model>
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
     * @param array<string,mixed> $data
     * @return array<string,array<int,mixed>>
     */
    public function queryForDatatable(array $data): array
    {
        $query = parent::queryForDatatable($data);

        $selectableModelName = $data['selectableModel']->getTable();

        $query['join'] = [
            $selectableModelName,
            $this->model->getTable() . '.' . $data['selectable_key'],
            '=',
            $selectableModelName . '.id',
            'left',
        ];

        $query['select'][] = $selectableModelName . '.title as ' . $data['selectable_key'];

        return $query;
    }
}
