<?php

namespace App\Http\Controllers\ModelControllers;

use App\DataTransferObjects\ModelDTO\ProductCategoryDTO;
use App\Http\Requests\CreateProductCategoryRequest;
use App\Http\Resources\ProductCategoryResource;
use App\Services\ModelServices\ProductCategoryService;

class ProductCategoryController extends BaseAdminController
{
    public function __construct(
        ProductCategoryService $service
    )
    {
        parent::__construct($service, ProductCategoryDTO::class, ProductCategoryResource::class, CreateProductCategoryRequest::class);
    }
}
