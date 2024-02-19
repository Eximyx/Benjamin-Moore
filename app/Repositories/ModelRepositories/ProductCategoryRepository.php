<?php

namespace App\Repositories\ModelRepositories;

use App\Models\ProductCategory as Model;

class ProductCategoryRepository extends BaseModelRepository
{
    public function __construct()
    {
        parent::__construct(Model::class);
    }
}
