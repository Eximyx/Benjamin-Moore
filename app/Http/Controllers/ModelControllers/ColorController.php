<?php

namespace App\Http\Controllers\ModelControllers;

use App\DataTransferObjects\ModelDTO\ColorDTO;
use App\Http\Requests\CreateColorRequest;
use App\Http\Resources\ColorResource;
use App\Services\ModelServices\ColorService;

class ColorController extends BaseAdminController
{
    public function __construct(ColorService $service)
    {
        parent::__construct($service, ColorDTO::class, ColorResource::class, CreateColorRequest::class);
    }
}
