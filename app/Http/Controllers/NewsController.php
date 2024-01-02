<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;

use App\Models\Category;
use App\Models\NewsPost;

class NewsController extends BaseController
{
    public function __construct(NewsPost $model, Category $Selectable) {
        parent::__construct($model,$Selectable);    
    }
}
