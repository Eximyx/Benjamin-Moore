<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Services\ProductService;

class ProductsController extends FakeController
{
    public function __construct(
        ProductService $productService,
        CreateProductRequest $createProductRequest
    ) {
        parent::__construct($productService, $createProductRequest);
    }
}
