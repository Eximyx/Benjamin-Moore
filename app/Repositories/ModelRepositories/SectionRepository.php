<?php

namespace App\Repositories\ModelRepositories;

use App\Models\Section;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class SectionRepository extends BaseModelRepository
{
    public function __construct()
    {
        parent::__construct(Section::class);
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

    /**
     * @return Collection<int, Model>
     *
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function getSectionsWithPositions(): Collection
    {
        return $this->model->where('section_position_id', '<>', 'null')->get();
    }
}
