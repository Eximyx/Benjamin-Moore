<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNewsPostRequest;
use App\Services\NewsService;

class NewsController extends FakeController
{
    public function __construct(
        NewsService $newsService
    ) {
        parent::__construct($newsService, new CreateNewsPostRequest());
    }
}
