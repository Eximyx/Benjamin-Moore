<?php

namespace App\Http\Controllers\SettingsControllers;

use App\DataTransferObjects\ModelDTO\SectionDTO;
use App\DataTransferObjects\ToggleSectionDTO;
use App\Http\Controllers\CoreController;
use App\Http\Requests\CreateSectionRequest;
use App\Http\Requests\ToggleSectionRequest;
use App\Http\Resources\SectionResource;
use App\Http\Resources\ToggleResource;
use App\Services\SettingsServices\SectionService;
use Illuminate\Http\Resources\Json\JsonResource;

class SectionController extends CoreController
{
    public function __construct(SectionService $service)
    {
        parent::__construct($service, SectionDTO::class, SectionResource::class, CreateSectionRequest::class);
    }

    public function toggle(ToggleSectionRequest $request): JsonResource
    {
        $dto = ToggleSectionDTO::appRequest($request);

        return ToggleResource::make($this->service->toggle($dto));
    }
}
