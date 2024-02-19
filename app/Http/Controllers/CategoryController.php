<?php

namespace App\Http\Controllers;

use App\DataTransferObjects\CategoryDTO;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Services\ModelServices\CategoryServiceBase;

class CategoryController extends BaseAdminController
{
    public function __construct(
        CategoryServiceBase $service
    )
    {
        parent::__construct($service, CategoryDTO::class, CategoryResource::class, CreateCategoryRequest::class);
    }
}
