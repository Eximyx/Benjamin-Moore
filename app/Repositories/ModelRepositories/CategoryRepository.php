<?php

namespace App\Repositories\ModelRepositories;

use App\Models\Category as Model;

class CategoryRepository extends BaseModelRepository
{
    public function __construct()
    {
        parent::__construct(Model::class);
    }
}
