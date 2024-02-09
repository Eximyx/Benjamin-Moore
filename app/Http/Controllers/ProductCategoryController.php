<?php

namespace App\Http\Controllers;

use App\DataTransferObjects\ProductCategoryDTO;
use App\Http\Requests\CreateProductCategoryRequest;
use App\Http\Resources\ProductCategoryResource;
use App\Services\ProductCategoryService;

class ProductCategoryController extends BaseAdminController
{
    public function __construct(
        ProductCategoryService $service
    ) {
        parent::__construct($service, ProductCategoryDTO::class, ProductCategoryResource::class, CreateProductCategoryRequest::class);
    }
}
