<?php

namespace App\Services\ModelServices;

use App\Repositories\ModelRepositories\StaticPageRepository;

class StaticPageService extends BaseModelService
{
    public function __construct(StaticPageRepository $repository)
    {
        parent::__construct($repository);
    }
}
