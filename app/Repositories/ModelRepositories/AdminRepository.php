<?php

namespace App\Repositories\ModelRepositories;

use App\Models\User as Model;

class AdminRepository extends BaseModelRepository
{
    public function __construct()
    {
        parent::__construct(Model::class);
    }
}
