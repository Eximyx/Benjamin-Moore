<?php

namespace App\Http\Controllers\ModelControllers;

use App\DataTransferObjects\ModelDTO\CategoryDTO;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Services\ModelServices\CategoryService;

class CategoryController extends BaseAdminController
{
    public function __construct(
        CategoryService $service
    )
    {
        parent::__construct($service, CategoryDTO::class, CategoryResource::class, CreateCategoryRequest::class);
    }
}
