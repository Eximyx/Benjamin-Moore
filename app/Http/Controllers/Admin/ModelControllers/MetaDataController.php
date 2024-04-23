<?php

namespace App\Http\Controllers\Admin\ModelControllers;

use App\DataTransferObjects\ModelDTO\MetaDataDTO;
use App\Http\Requests\CreateMetaDataRequest;
use App\Http\Resources\ModelResources\MetaDataResource;
use App\Services\Admin\ModelServices\MetaDataService;

class MetaDataController extends BaseAdminController
{
    /**
     * @param MetaDataService $service
     */
    public function __construct(MetaDataService $service)
    {
        parent::__construct($service, MetaDataDTO::class, MetaDataResource::class, CreateMetaDataRequest::class);
    }
}
