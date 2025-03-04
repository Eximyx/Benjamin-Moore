<?php

namespace App\Repositories\ModelRepositories;

use App\Models\NewsPost;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
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

        $entities = $entities->query()->join(...$query['join']);

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
     * @return LengthAwarePaginator
     */
    public function paginate(): LengthAwarePaginator
    {
        return $this->model->paginate();
    }

    /**
     * @param string $slug
     * @return Model
     */
    public function findBySlug(string $slug): Model
    {
        return $this->model->where('slug', '=', $slug)->firstOrFail();
    }

    /**
     * @param int|null $amount
     * @return Builder
     */
    public function getLatest(?int $amount = null): Builder
    {
        $entities = $this->model::latest();

        if ($amount) {
            $entities = $entities->take($amount);
        }

        return $entities;
    }
}
