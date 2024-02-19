<?php

namespace App\Services\ModelServices;

use App\Repositories\ModelRepositories\StaticPageRepository;

class StaticPageServiceBase extends BaseModelService
{
    public function __construct(
        StaticPageRepository $repository
    )
    {
        parent::__construct($repository);
    }
}
