<?php

namespace App\Repositories\ModelRepositories;

use App\Models\Color as Model;
use App\Models\Color_product;

class ColorProductRepository extends BaseModelRepository
{
    public function __construct()
    {
        parent::__construct(Model::class);
    }

    public function getColorIds(string $id): array
    {
        return Color_product::Where('product_id', $id)->pluck('color_id')->all();
    }

}
