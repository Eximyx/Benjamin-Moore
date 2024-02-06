<?php

namespace App\Services;

use App\Repositories\ProductCategoryRepository;

class ProductCategoryService extends BaseService
{
    public function __construct(
        ProductCategoryRepository $repository
    ) {
        parent::__construct($repository);
    }
}
