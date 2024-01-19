<?php

namespace App\Services;

use App\Repositories\AuthRepository;

class AuthService extends BaseService
{
    public function __construct(AuthRepository $repository)
    {
        parent::__construct();
        $this->repository = $repository;
    }


}