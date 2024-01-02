<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;

use App\Models\NewsPost;

class NewsController extends BaseController
{
    public function __construct(NewsPost $model) {
        parent::__construct($model);    
    }
}
