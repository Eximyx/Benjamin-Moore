<?php

namespace App\Http\Controllers;

use App\DataTransferObjects\AdminDTO;
use App\Http\Requests\CreateAdminRequest;
use App\Http\Resources\AdminResource;
use App\Services\AdminService;

class AdminController extends FakeController
{
    public function __construct(
        AdminService $service
    ) {
        parent::__construct($service, AdminDTO::class, AdminResource::class, CreateAdminRequest::class);
    }
}
