<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategoryRequest;
use App\Services\CategoryService;
use App\DataTransferObjects\CategoryDTO;
use App\Http\Resources\CategoryResource;

class CategoryController extends FakeController
{
    public function __construct(
        CategoryService $service
    ) {
        parent::__construct($service,  CategoryDTO::class, CategoryResource::class, CreateCategoryRequest::class);
    }
}
