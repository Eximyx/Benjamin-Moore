<?php

namespace App\Http\Controllers\ModelControllers;

use App\DataTransferObjects\ModelDTO\MetaDataDTO;
use App\Http\Requests\CreateMetaDataRequest;
use App\Http\Resources\MetaDataResource;
use App\Services\ModelServices\MetaDataService;

class MetaDataController extends BaseAdminController
{
    public function __construct(MetaDataService $service)
    {
        parent::__construct($service, MetaDataDTO::class, MetaDataResource::class, CreateMetaDataRequest::class);
    }
}
