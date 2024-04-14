<?php

namespace App\Repositories\ModelRepositories;

use App\Models\Color;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class ColorRepository extends BaseModelRepository
{
    public function __construct()
    {
        parent::__construct(Color::class);
    }

    /**
     * @param array<int, int> $colorIds
     * @return array<int, int>
     */
    public function getColors(array $colorIds): array
    {
        return $this->model::whereIn('id', $colorIds)->pluck('id')->all();
    }

    /**
     * @return Collection<int, Model>
     */
    public function getColorsForCatalog(): Collection
    {
        return $this->model::all();
    }
}
