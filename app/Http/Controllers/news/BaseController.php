<?php

namespace App\Http\Controllers\news;

use App\Services\Categories\CategoryService;
use App\Services\News\Service;

class BaseController 
{
    public $service;

    public function __construct(Service $service,)
    {
        $this->service = $service;
    }
}
