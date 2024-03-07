<?php

namespace App\Http\Controllers\Admin\ModelControllers;

use App\DataTransferObjects\ModelDTO\ColorDTO;
use App\Http\Requests\ColorRequest;
use App\Http\Resources\ModelResources\ColorResource;
use App\Services\Admin\ModelServices\ColorService;

class ColorController extends BaseAdminController
{
    public function __construct(ColorService $service)
    {
        parent::__construct($service, ColorDTO::class, ColorResource::class, ColorRequest::class);
    }
}
