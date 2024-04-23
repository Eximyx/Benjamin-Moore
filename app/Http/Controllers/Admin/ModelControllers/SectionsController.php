<?php

namespace App\Http\Controllers\Admin\ModelControllers;

use App\DataTransferObjects\ModelDTO\SectionDTO;
use App\Http\Requests\SectionRequest;
use App\Http\Resources\ModelResources\SectionResource;
use App\Services\Admin\ModelServices\SectionService;

class SectionsController extends BaseAdminController
{
    /**
     * @param SectionService $service
     */
    public function __construct(SectionService $service)
    {
        parent::__construct($service, SectionDTO::class, SectionResource::class, SectionRequest::class);
    }
}
