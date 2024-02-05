<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategoryRequest;
use App\Services\CategoryService;

class CategoryController extends FakeController
{
    public function __construct(
        CategoryService $categoryService
    ) {
        parent::__construct($categoryService, new CreateCategoryRequest());
    }
}
