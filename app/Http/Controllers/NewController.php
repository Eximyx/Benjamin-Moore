<?php
// use App\Http\Controllers\FakeController;
namespace App\Http\Controllers;

use App\Http\Requests\CreateNewsPostRequest;
use App\Repositories\NewsRepository;
use App\Services\NewsService;

class NewController extends FakeController
{

    public function __construct(NewsService $service)
    {
        parent::__construct(new CreateNewsPostRequest());
        $this->service = $service;
    }

}