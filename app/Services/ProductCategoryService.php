<?php

namespace App\Services;

use App\Repositories\ProductCategoryRepository;

class ProductCategoryService extends BaseService
{
    public function __construct(ProductCategoryRepository $productCategoryRepository)
    {
        parent::__construct();
        $this->repository = $productCategoryRepository;
    }


}