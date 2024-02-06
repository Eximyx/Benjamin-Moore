<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStaticPageRequest;
use App\Services\StaticPageService;

class StaticPageController extends FakeController
{
    public function __construct(
        StaticPageService $staticPageService
    ) {
        parent::__construct($staticPageService,  );
    }
}
