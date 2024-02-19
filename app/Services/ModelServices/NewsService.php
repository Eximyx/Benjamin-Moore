<?php

namespace App\Services\ModelServices;

use App\Repositories\ModelRepositories\NewsRepository;

class NewsService extends BaseModelService
{
    public function __construct(NewsRepository $repository)
    {
        parent::__construct($repository);
    }
}
