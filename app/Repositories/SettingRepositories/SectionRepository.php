<?php

namespace App\Repositories\SettingRepositories;

use App\Models\Section;
use Illuminate\Database\Eloquent\Collection;

class SectionRepository
{
    public function findById(string|int $id): ?Section
    {
        return Section::find($id);
    }

    public function nullPosition(): int
    {
        return Section::query()->update(['position' => null]);
    }

    public function delete(Section $section): Section
    {
        return tap($section)->delete();
    }

    /**
     * @return Collection<int,Section>
     */
    public function getActive(): Collection
    {
        return Section::where('position', '>', '0')->get();
    }

    /**
     * @param array<int,int|string> $array
     * @return Collection<int,Section>
     */
    public function toggle(array $array): Collection
    {
        $toggled = Section::whereIn('id', $array)->get();

        foreach ($toggled as $key => $value) {
            $value->position = $key + 1;
            $value->save();
        }

        return $toggled;
    }

    /**
     * @return Collection<int, Section>
     */
    public function getSections(): Collection
    {
        return Section::all();
    }
}
