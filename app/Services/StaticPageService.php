<?php

namespace App\Services;

use App\Repositories\StaticPageRepository;

class StaticPageService extends BaseService
{
    public function __construct(
        StaticPageRepository $repository
    ) {
        parent::__construct($repository);
    }
}
