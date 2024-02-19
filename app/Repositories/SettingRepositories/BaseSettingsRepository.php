<?php

namespace App\Repositories\SettingRepositories;

use App\Models\Banner;
use App\Repositories\CoreRepository;
use Illuminate\Database\Eloquent\Collection;

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
     * @return Collection<int,Banner>
     */
    public function getActive(): Collection
    {
        return $this->getModelClass()::where('position', '>', '0')->get();
    }

    /**
     * @param  array<int,int|string>  $array
     * @return array<int,Banner|null>
     */
    public function toggle(array $array): array
    {
        $collection = [];
        foreach ($array as $key => $value) {
            $entity = Banner::find($value);
            if (! empty($entity)) {
                $entity->position = $key + 1;
                $entity->save();
            }
            $collection[] = $entity;
        }

        return $collection;
    }
}
