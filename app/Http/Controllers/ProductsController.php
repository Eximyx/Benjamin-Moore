<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Repositories\ProductRepository;
use App\Services\ProductService;

class ProductsController extends FakeController
{
    
    public function __construct(ProductService $service, ProductRepository $repository)
    {
        parent::__construct(new CreateProductRequest());
        $this->service = $service;
        $this->repository = $repository; 
    }
}
