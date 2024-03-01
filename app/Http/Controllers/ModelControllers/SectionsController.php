<?php

namespace App\Http\Controllers\ModelControllers;

use App\DataTransferObjects\ModelDTO\SectionDTO;
use App\Http\Requests\CreateSectionRequest;
use App\Http\Resources\SectionResource;
use App\Services\SettingsServices\SectionService;

class SectionsController extends BaseAdminController
{
    public function __construct(SectionService $service)
    {
        parent::__construct($service, SectionDTO::class, SectionResource::class, CreateSectionRequest::class);
    }
}
