<?php

namespace App\Repositories\ModelRepositories;

use App\Models\Banner;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class BannersRepository extends BaseModelRepository
{
    public function __construct()
    {
        parent::__construct(Banner::class);
    }

    /**
     * @param string|null $bannerPositionId
     * @return void
     */
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
     * @return Collection<int, Model>
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function getBannersWithPositions(): Collection
    {
        return $this->model->where('banner_position_id', '<>', 'null')->get();
    }

    /**
     * @param int $id
     * @return Model
     */
    public function getBannerByPositionId(int $id): Model
    {
        return $this->model->where('banner_position_id', '=', $id)->firstOrFail();
    }
}
