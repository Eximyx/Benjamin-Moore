<?php

namespace App\Http\Controllers\Admin\ModelControllers;

use App\DataTransferObjects\ModelDTO\PartnersDTO;
use App\Http\Requests\PartnersRequest;
use App\Http\Resources\ModelResources\PartnersResource;
use App\Services\Admin\ModelServices\PartnersService;

class PartnersController extends BaseAdminController
{
    /**
     * @param PartnersService $service
     */
    public function __construct(PartnersService $service)
    {
        parent::__construct($service, PartnersDTO::class, PartnersResource::class, PartnersRequest::class);
    }
}
