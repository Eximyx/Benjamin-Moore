<?php

namespace App\Services;

use App\Repositories\NewsRepository;

class NewsService extends BaseService
{
    protected $repository;
    public function __construct(NewsRepository $newsRepository)
    {
        $this->repository = $newsRepository;
    }
}