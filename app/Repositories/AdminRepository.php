<?php

namespace App\Repositories;

use App\Models\User as Model;

class AdminRepository extends CoreRepository
{
    public function __construct()
    {
        parent::__construct(Model::class);
    }
}
