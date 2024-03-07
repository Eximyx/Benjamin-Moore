<?php

namespace App\Http\Controllers\ModelControllers;

use App\DataTransferObjects\ModelDTO\CategoryDTO;
use App\Http\Requests\NewsCategoryRequest;
use App\Http\Resources\NewsCategoryResource;
use App\Services\ModelServices\CategoryService;

class CategoryController extends BaseAdminController
{
    public function __construct(CategoryService $service)
    {
        parent::__construct($service, CategoryDTO::class, NewsCategoryResource::class, NewsCategoryRequest::class);
    }
}
