<?php

namespace App\Http\Controllers\ModelControllers;

use App\DataTransferObjects\ModelDTO\LeadDTO;
use App\Http\Requests\CreateLeadsRequest;
use App\Http\Resources\LeadResource;
use App\Services\ModelServices\LeadsService;

class LeadsController extends BaseAdminController
{
    public function __construct(
        LeadsService $service,
    )
    {
        parent::__construct($service, LeadDTO::class, LeadResource::class, CreateLeadsRequest::class);
    }
}
