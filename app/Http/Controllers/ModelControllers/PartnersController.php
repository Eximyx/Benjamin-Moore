<?php

namespace App\Http\Controllers\ModelControllers;

use App\DataTransferObjects\ModelDTO\PartnersDTO;
use App\Http\Requests\PartnersRequest;
use App\Http\Resources\PartnersResource;
use App\Services\ModelServices\PartnersService;

class PartnersController extends BaseAdminController
{
    public function __construct(PartnersService $service)
    {
        parent::__construct($service, PartnersDTO::class, PartnersResource::class, PartnersRequest::class);
    }
}

