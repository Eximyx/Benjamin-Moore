<?php

namespace App\Services\ModelServices;

use App\Repositories\ModelRepositories\ProductCategoryRepository;

class ProductCategoryService extends BaseModelService
{
    public function __construct(
        ProductCategoryRepository $repository
    ) {
        parent::__construct($repository);
    }
}
