<?php

namespace App\Http\Controllers\Admin\ModelControllers;

use App\DataTransferObjects\ModelDTO\ProductCategoryDTO;
use App\Http\Requests\ProductCategoryRequest;
use App\Http\Resources\ModelResources\ProductCategoryResource;
use App\Services\Admin\ModelServices\ProductCategoryService;

class ProductCategoryController extends BaseAdminController
{
    public function __construct(ProductCategoryService $service)
    {
        parent::__construct($service, ProductCategoryDTO::class, ProductCategoryResource::class, ProductCategoryRequest::class);
    }
}
