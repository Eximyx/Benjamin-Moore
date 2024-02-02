<?php

namespace App\Services;

use App\Repositories\StaticPageRepository;

class StaticPageService extends BaseService
{
    public function __construct(StaticPageRepository $staticPageRepository)
    {
        parent::__construct($staticPageRepository);
    }
}
