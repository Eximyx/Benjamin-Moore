<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductsController extends BaseController
{
    public function __construct(Product $model) {
        parent::__construct($model);    
    }
}
