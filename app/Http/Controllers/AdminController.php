<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAdminRequest;
use App\Services\AdminService;

class AdminController extends FakeController
{
    public function __construct(AdminService $adminService)
    {
        parent::__construct($adminService, new CreateAdminRequest());
    }
}
