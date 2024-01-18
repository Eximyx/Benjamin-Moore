<?php
// use App\Http\Controllers\FakeController;
namespace App\Http\Controllers;

use App\Repositories\NewsRepository;
use App\Services\NewsService;

class NewController extends FakeController{

    public function __construct(NewsService $service, NewsRepository $repository)
    {
        $this->service = $service;
        $this->repository = $repository; 
    }

}