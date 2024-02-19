<?php

namespace App\Repositories\SettingRepositories;

use App\Models\Banner;
use Illuminate\Database\Eloquent\Collection;

class BannersRepository
{
    public function findById(string|int $id): ?Banner
    {
        return Banner::find($id);
    }

    public function nullPosition(): int
    {
        return Banner::query()->update(['position' => null]);
    }

    public function delete(Banner $section): Banner
    {
        return tap($section)->delete();
    }

    /**
     * @return Collection<int,Banner>
     */
    public function getActive(): Collection
    {
        return Banner::where('position', '>', '0')->get();
    }

    /**
     * @return Collection<int,Banner>
     */
    public function getBanners(): Collection
    {
        return Banner::all();
    }

    /**
     * @param array<int,int|string> $array
     * @return array<int,Banner|null>
     */
    public function toggle(array $array): array
    {
        $collection = [];
        foreach ($array as $key => $value) {
            $entity = Banner::find($value);
            if (!empty($entity)) {
                $entity->position = $key + 1;
                $entity->save();
            }
            $collection[] = $entity;
        }

        return $collection;
    }

    public function update(string|int $id): ?Banner
    {
        return $this->findById($id);
    }
}
