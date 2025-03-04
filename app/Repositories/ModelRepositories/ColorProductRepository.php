<?php

namespace App\Repositories\ModelRepositories;

use App\Models\Color as Model;
use App\Models\ColorProduct;

class ColorProductRepository extends BaseModelRepository
{
    public function __construct()
    {
        parent::__construct(Model::class);
    }

    /**
     * @param string $id
     * @return array
     */
    public function getColorIds(string $id): array
    {
        return ColorProduct::where('product_id', $id)->pluck('color_id')->all();
    }
}
