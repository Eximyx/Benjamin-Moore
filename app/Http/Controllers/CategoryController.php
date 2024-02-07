<?php

namespace App\Http\Controllers;

use App\DataTransferObjects\CategoryDTO;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Services\CategoryService;

class CategoryController extends BaseAdminController
{
    public function __construct(
        CategoryService $service
    )
    {
        parent::__construct($service, CategoryDTO::class, CategoryResource::class, CreateCategoryRequest::class);
    }
}
