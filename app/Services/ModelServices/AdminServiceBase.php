<?php

namespace App\Services\ModelServices;

use App\Repositories\ModelRepositories\AdminRepository;

class AdminServiceBase extends BaseModelService
{
    public function __construct(AdminRepository $adminRepository)
    {
        parent::__construct($adminRepository);
    }
}
