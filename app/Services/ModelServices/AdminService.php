<?php

namespace App\Services\ModelServices;

use App\Repositories\ModelRepositories\AdminRepository;

class AdminService extends BaseModelService
{
    public function __construct(AdminRepository $adminRepository)
    {
        parent::__construct($adminRepository);
    }
}
