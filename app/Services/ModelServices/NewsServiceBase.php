<?php

namespace App\Services\ModelServices;

use App\Repositories\ModelRepositories\NewsRepository;

class NewsServiceBase extends BaseModelService
{
    public function __construct(
        NewsRepository $repository
    )
    {
        parent::__construct($repository);
    }
}
