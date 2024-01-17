<?php

namespace App\Services;

use App\Repositories\ProductCategoryRepository;

class ProductCategoryService extends BaseService
{
    protected $repository;
    public function __construct(ProductCategoryRepository $ProductCategoryRepository)
    {
        $this->repository = $ProductCategoryRepository;
    }
}