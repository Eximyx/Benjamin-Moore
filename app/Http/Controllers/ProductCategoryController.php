<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductCategoryRequest;
use App\Services\ProductCategoryService;




class ProductCategoryController extends FakeController
{
    public function __construct(ProductCategoryService $service)
    {
        parent::__construct(new CreateProductCategoryRequest());
        $this->service = $service;
    }
}
