<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductsController extends BaseController
{
    public function __construct(Product $model) {
        parent::__construct($model);    
    }
}
