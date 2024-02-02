<?php

namespace App\Services;

use App\Repositories\AdminRepository;

class AdminService extends BaseService
{
    public function __construct(AdminRepository $adminRepository)
    {
        parent::__construct($adminRepository);
    }
}
