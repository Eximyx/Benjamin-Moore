<?php

namespace App\Repositories;

use App\Models\Review as Model;

class ReviewRepository extends CoreRepository
{
    public function __construct()
    {
        parent::__construct(Model::class);
    }
}
