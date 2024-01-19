<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAdminRequest;
use App\Services\AdminService;

class AdminController extends FakeController
{
    //TODO сделать сто-то с возможностью редактировать себя
    public function __construct(AdminService $service)
    {
        parent::__construct(new CreateAdminRequest());
        $this->service = $service;
    }
}
