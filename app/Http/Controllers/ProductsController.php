<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepository;
use App\Services\ProductService;

class ProductsController extends FakeController
{
    public function __construct(ProductService $service, ProductRepository $repository)
    {
        $this->service = $service;
        $this->repository = $repository; 
    }
}
