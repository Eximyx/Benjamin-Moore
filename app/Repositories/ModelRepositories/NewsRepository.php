<?php

namespace App\Repositories\ModelRepositories;

use App\Models\NewsPost as Model;

class NewsRepository extends BaseModelRepository
{
    public function __construct()
    {
        parent::__construct(Model::class);
    }
}
