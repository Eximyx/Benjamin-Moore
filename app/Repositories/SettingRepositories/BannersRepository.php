<?php

namespace App\Repositories\SettingRepositories;

use App\Models\Banner;
use App\Repositories\ModelRepositories\BaseModelRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class BannersRepository extends BaseModelRepository
{
    public function __construct()
    {
        parent::__construct(Banner::class);
    }

    public function nullPosition(?string $bannerPositionId = null): void
    {
        if ($bannerPositionId) {
            $entity = $this->model::where('banner_position_id', $bannerPositionId)->first();
            if ($entity) {
                $entity->update(['banner_position_id' => null]);
                $entity->save();
            }
        }
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
