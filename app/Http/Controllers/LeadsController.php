<?php

namespace App\Http\Controllers;

use App\DataTransferObjects\LeadDTO;
use App\Http\Requests\CreateLeadsRequest;
use App\Http\Resources\LeadResource;
use App\Services\LeadsService;

class LeadsController extends FakeController
{
    public function __construct(
        LeadsService $service,
    ) {
        parent::__construct($service, LeadDTO::class, LeadResource::class, CreateLeadsRequest::class);
    }
}
