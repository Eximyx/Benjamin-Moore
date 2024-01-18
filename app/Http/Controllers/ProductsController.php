<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Services\ProductService;

class ProductsController extends FakeController
{
    
    public function __construct(ProductService $service)
    {
        parent::__construct(new CreateProductRequest());
        $this->service = $service;
    }

    public function wrapper() {
        
    }
}
