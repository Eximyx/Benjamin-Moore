<?php

namespace App\Http\Controllers;

use App\Repositories\ProductCategoryRepository;
use App\Services\ProductCategoryService;
use App\Http\Requests\ProductCategoryRequest;



class ProductCategoryController extends FakeController{
    public function __construct(ProductCategoryService $service, ProductCategoryRepository $repository, ProductCategoryRequest $request) {
        $this->service = $service;
        $this->repository = $repository;
        $this->request = $request;
    }


}
