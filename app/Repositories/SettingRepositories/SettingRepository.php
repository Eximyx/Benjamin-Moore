<?php

namespace App\Repositories\SettingRepositories;

use App\Repositories\CoreRepository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class SettingRepository extends CoreRepository
{
    public function __construct(?string $modelClass)
    {
        parent::__construct($modelClass);
    }

    /**
     * @param array<int> $array
     * @return array<int|string,array<int|string, mixed>>
     */
    public function toggle(array $array): array
    {
        $collection[] = ['active_items' => []];
        foreach ($array as $key => $value) {
            $entity = $this->model::find($value);
            if (!empty($entity)) {
                $entity['position'] = $key + 1;
                $entity = $this->save($entity);
            }
            $collection['active_items'][] = $entity;
        }

        return $collection;
    }

    public function nullPosition(): int
    {
        return $this->model::query()->update(['position' => null]);
    }

    /**
     * @return Builder<Model>
     */
    public function getActive(): Builder
    {
        return $this->model::where('position', '>', '0')->orderBy('position');
    }
}
