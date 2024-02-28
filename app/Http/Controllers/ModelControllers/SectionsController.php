<?php

namespace App\Http\Controllers\ModelControllers;

use App\DataTransferObjects\ModelDTO\SectionDTO;
use App\DataTransferObjects\ToggleSectionsDTO;
use App\Http\Requests\CreateSectionRequest;
use App\Http\Requests\ToggleSectionRequest;
use App\Http\Resources\SectionResource;
use App\Services\SettingsServices\SectionService;
use Illuminate\Http\JsonResponse;

class SectionsController extends BaseAdminController
{
    public function __construct(SectionService $service)
    {
        parent::__construct($service, SectionDTO::class, SectionResource::class, CreateSectionRequest::class);
    }

    public function toggle(ToggleSectionRequest $request): JsonResponse
    {
        $this->service->toggle(ToggleSectionsDTO::appRequest($request));
        return response()->json(['status' => '200']);
    }


}
