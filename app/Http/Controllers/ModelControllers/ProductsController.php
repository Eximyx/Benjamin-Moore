<?php

namespace App\Http\Controllers\ModelControllers;

use App\DataTransferObjects\ProductDTO;
use App\Http\Requests\CreateProductRequest;
use App\Http\Resources\ProductResource;
use App\Services\ModelServices\ProductService;

class ProductsController extends BaseAdminController
{
    public function __construct(
        ProductService $service,

    )
    {
        parent::__construct($service, ProductDTO::class, ProductResource::class, CreateProductRequest::class);
    }
}
