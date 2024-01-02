<?php

namespace App\Http\Controllers;

use App\Models\StaticPage;
use Illuminate\Http\Request;

class StaticPageController extends BaseController
{
    public function __construct(StaticPage $model) {
        parent::__construct($model);    
    }
}
