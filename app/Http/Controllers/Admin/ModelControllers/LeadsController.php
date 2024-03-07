<?php

namespace App\Http\Controllers\Admin\ModelControllers;

use App\DataTransferObjects\ModelDTO\LeadDTO;
use App\Http\Requests\LeadsRequest;
use App\Http\Resources\ModelResources\LeadResource;
use App\Services\Admin\ModelServices\LeadsService;

class LeadsController extends BaseAdminController
{
    public function __construct(LeadsService $service)
    {
        parent::__construct($service, LeadDTO::class, LeadResource::class, LeadsRequest::class);
    }
}
