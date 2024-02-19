<?php

namespace App\Http\Controllers;

use App\DataTransferObjects\LeadDTO;
use App\Http\Requests\CreateLeadsRequest;
use App\Http\Resources\LeadResource;
use App\Services\ModelServices\LeadsServiceBase;

class LeadsController extends BaseAdminController
{
    public function __construct(
        LeadsServiceBase $service,
    )
    {
        parent::__construct($service, LeadDTO::class, LeadResource::class, CreateLeadsRequest::class);
    }
}
