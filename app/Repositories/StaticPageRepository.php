<?php

namespace App\Repositories;

use App\Models\StaticPage as Model;

class StaticPageRepository extends CoreRepository
{
    public function __construct()
    {
        parent::__construct(Model::class);
    }
}
