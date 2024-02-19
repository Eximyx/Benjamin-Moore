<?php

namespace App\Repositories\ModelRepositories;


use App\Models\User;

class AdminRepository extends BaseModelRepository
{
    public function __construct()
    {
        parent::__construct(User::class);
    }
}
