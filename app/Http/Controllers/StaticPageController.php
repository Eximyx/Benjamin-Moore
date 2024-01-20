<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStaticPageRequest;
use App\Services\StaticPageService;

class StaticPageController extends FakeController
{
    public function __construct(StaticPageService $service)
    {
        parent::__construct(new CreateStaticPageRequest());
        $this->service = $service;
    }
}
