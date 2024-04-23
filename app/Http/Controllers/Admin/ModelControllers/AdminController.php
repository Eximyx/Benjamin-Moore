<?php

namespace App\Http\Controllers\Admin\ModelControllers;

use App\DataTransferObjects\ModelDTO\AdminDTO;
use App\Http\Requests\AdminRequest;
use App\Http\Resources\ModelResources\AdminResource;
use App\Services\Admin\ModelServices\AdminService;

class AdminController extends BaseAdminController
{
    /**
     * @param AdminService $service
     */
    public function __construct(AdminService $service)
    {
        parent::__construct($service, AdminDTO::class, AdminResource::class, AdminRequest::class);
    }
}
