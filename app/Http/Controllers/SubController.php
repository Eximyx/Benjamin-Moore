<?php

namespace App\Http\Controllers;

use App\Models\NewsPost;
use App\Models\Category;


class SubController extends BController
{
    // public function 
    public function __construct(NewsPost $model, Category $selectableModel)
    {
        parent::__construct($model,$selectableModel);
    }
}
