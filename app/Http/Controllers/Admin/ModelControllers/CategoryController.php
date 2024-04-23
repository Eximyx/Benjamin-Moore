<?php

namespace App\Http\Controllers\Admin\ModelControllers;

use App\DataTransferObjects\ModelDTO\CategoryDTO;
use App\Http\Requests\NewsCategoryRequest;
use App\Http\Resources\ModelResources\NewsCategoryResource;
use App\Services\Admin\ModelServices\CategoryService;

class CategoryController extends BaseAdminController
{
    /**
     * @param CategoryService $service
     */
    public function __construct(CategoryService $service)
    {
        parent::__construct($service, CategoryDTO::class, NewsCategoryResource::class, NewsCategoryRequest::class);
    }
}
