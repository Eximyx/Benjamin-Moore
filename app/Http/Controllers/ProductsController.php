<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\DataTransferObjects\ProductDTO;
use App\Services\ProductService;
use App\Http\Resources\ProductResource;

class ProductsController extends FakeController
{
    public function __construct(
        ProductService $service,

    ) {
        parent::__construct($service, ProductDTO::class, ProductResource::class, CreateProductRequest::class);
    }
}
