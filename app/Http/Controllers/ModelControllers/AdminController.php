<?php

namespace App\Http\Controllers\ModelControllers;

use App\DataTransferObjects\ModelDTO\AdminDTO;
use App\Http\Requests\AdminRequest;
use App\Http\Resources\AdminResource;
use App\Services\ModelServices\AdminService;

class AdminController extends BaseAdminController
{
    public function __construct(AdminService $service)
    {
        parent::__construct($service, AdminDTO::class, AdminResource::class, AdminRequest::class);
    }
}
