<?php

namespace App\Http\Controllers;

use App\DataTransferObjects\AdminDTO;
use App\Http\Requests\CreateAdminRequest;
use App\Http\Resources\AdminResource;
use App\Services\ModelServices\AdminServiceBase;

class AdminController extends BaseAdminController
{
    public function __construct(
        AdminServiceBase $service
    )
    {
        parent::__construct($service, AdminDTO::class, AdminResource::class, CreateAdminRequest::class);
    }
}
