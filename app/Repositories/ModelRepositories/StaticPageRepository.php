<?php

namespace App\Repositories\ModelRepositories;

use App\Models\StaticPage as Model;

class StaticPageRepository extends BaseModelRepository
{
    public function __construct()
    {
        parent::__construct(Model::class);
    }
}
