<?php /** @noinspection StaticInvocationViaThisInspection */

namespace App\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;


abstract class CoreRepository
{

    protected Model $model;
    /**
     * @var array<string,mixed>
     */
    public array $modelData;

    public function __construct(
        string|null $modelClass
    )
    {
        $this->model = app($modelClass);
        $this->modelData = ((array)config('getmodelconfig'))[$modelClass];
    }

    public function getModelClass(): string
    {
        return $this->model::class;
    }

    /**
     * @return Model
     */
    public function startConditions(): Model
    {
        return clone $this->model;
    }


    /**
     * @return Collection<int,Model>
     */
    public function getAll(): Collection
    {
        return $this->model->all();
    }

    /**
     * @param int|null $amount
     * @return Builder<Model>
     */
    public function getLatest(int $amount = null): Builder
    {
        $entities = $this->model::latest();

        if ($amount) {
            $entities = $entities->take($amount);
        }
        return $entities;
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

    public function findBySlug(string $slug): Model|null
    {
        return $this->model::where("slug", $slug)->first();
    }

    public function findById(string $id): Model|null
    {
        return $this->model::find($id);
    }

    public function save(Model $entity): Model
    {
        return tap($entity)->save();
    }

    /**
     * @param array<string,mixed> $data
     * @return Model|null
     */
    public function create(array $data): Model|null
    {
        return $this->model->create($data);
    }

    /**
     * @param Model|null $entity
     * @param array<string, mixed> $dto
     * @return Model
     */
    public function update(Model|null $entity, array $dto): Model
    {
        return tap($entity)->update($dto);
    }


    public function destroy(Model $entity): Model
    {
        return tap($entity)->delete();
    }

    /**
     * @param array<string,mixed> $data
     * @param mixed $selectable_key
     * @return array<string,array<int,mixed>>
     */
    public function queryForDatatable(array $data, mixed $selectable_key): array
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
