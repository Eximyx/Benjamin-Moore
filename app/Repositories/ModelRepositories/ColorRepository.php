<?php

namespace App\Repositories\ModelRepositories;

use App\Models\Color;
use App\Models\Color as Model;

class ColorRepository extends BaseModelRepository
{
    public function __construct()
    {
        parent::__construct(Model::class);
    }

    public function getColors(array $colorIds): array
    {
        return Color::whereIn('id', $colorIds)->pluck('id')->all();
    }

}
