<?php

namespace App\Services;

use App\Repositories\NewsRepository;

class NewsService extends BaseService
{
    public function __construct(NewsRepository $newsRepository)
    {
        parent::__construct($newsRepository);
    }
}
