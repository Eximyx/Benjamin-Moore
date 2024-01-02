<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;


class ProductCategoryController extends BaseController
{
    public function __construct(ProductCategory $model) {
        parent::__construct($model);    
    }
   
}
