<?php
// use App\Http\Controllers\FakeController;
namespace App\Http\Controllers;

use App\Repositories\NewsRepository;
use App\Services\NewsService;
use App\Http\Requests\CreateNewsPostRequest;

class NewController extends FakeController{

    public function __construct(NewsService $service, NewsRepository $repository, CreateNewsPostRequest $request)
    {
        $this->service = $service;
        $this->repository = $repository; 
    }

}