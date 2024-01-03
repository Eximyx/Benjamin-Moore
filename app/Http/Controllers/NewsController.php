<?php

namespace App\Http\Controllers;

use App\Models\NewsPost;

class NewsController extends BaseController
{
    public function __construct(NewsPost $model) {
        parent::__construct($model);    
    }

    // public function shop() {
    //     $products = $this->model::All();
    //     return view("welcome",compact("products"));
    // }
}
