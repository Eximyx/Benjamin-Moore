<?php

namespace App\Repositories\ModelRepositories;

use App\Models\Review as Model;

class ReviewRepository extends BaseModelRepository
{
    public function __construct()
    {
        parent::__construct(Model::class);
    }
}
