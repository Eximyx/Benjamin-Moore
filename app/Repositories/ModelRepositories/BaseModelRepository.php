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

    /**
     * @param string|null $modelClass
     */
    public function __construct(?string $modelClass)
    {
        parent::__construct($modelClass);

        $this->modelData = ((array)config('getmodelconfig'))[$modelClass];
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
    public function getAllForDatatable(): Collection
    {
        $data = $this->modelData;

        $query = $this->queryForDatatable($data);

        $entities = $this->startConditions();

        return $entities->query()->select(...$query['select'])->get();
    }

    /**
     * @param array<string,mixed> $data
     * @return array<string,array<int,mixed>>
     */
    public function queryForDatatable(array $data): array
    {
        $query = [];
        $modelName = $this->model->getTable();

        foreach ($data['datatable_data'] as $item) {
            $query['select'][] = $modelName . '.' . $item;
        }
        
        $query['select'][] = $modelName . '.created_at';
        $query['select'][] = $modelName . '.updated_at';

        return $query;
    }
}
