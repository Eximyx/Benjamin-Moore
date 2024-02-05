<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductCategoryRequest;
use App\Services\ProductCategoryService;

class ProductCategoryController extends FakeController
{
    public function __construct(
        ProductCategoryService $productCategoryService
    ) {
        parent::__construct($productCategoryService, new CreateProductCategoryRequest());
    }
}
