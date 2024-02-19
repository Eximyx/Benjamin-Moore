<?php

namespace App\Repositories\SettingRepositories;

use App\Repositories\CoreRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class BaseSettingsRepository extends CoreRepository
{
    public function __construct(?string $modelClass)
    {
        parent::__construct($modelClass);
    }

    public function nullPosition(): int
    {
        return $this->model::query()->update(['position' => null]);
    }

    /**
     * @return Collection<int,Model>
     *
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function getActive(): Collection
    {
        return $this->model::where('position', '>', '0')->orderBy('position')->get();
    }

    /**
     * @param array<int,int|string> $array
     * @return array<int,Model|null>
     */
    public function toggle(array $array): array
    {
        $collection = [];
        foreach ($array as $key => $value) {
            $entity = $this->model::find($value);
            if (!empty($entity)) {
                $entity['position'] = $key + 1;
                $entity->save();
            }
            $collection[] = $entity;
        }

        return $collection;
    }
}
