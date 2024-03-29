<?php

namespace App\Http\Controllers\Admin\ModelControllers;

use App\DataTransferObjects\ModelDTO\ColorDTO;
use App\Http\Requests\ColorRequest;
use App\Http\Resources\ModelResources\ColorResource;
use App\Models\Color;
use App\Services\Admin\ModelServices\ColorService;
use Illuminate\Http\Request;

class ColorController extends BaseAdminController
{
    public function __construct(ColorService $service)
    {
        parent::__construct($service, ColorDTO::class, ColorResource::class, ColorRequest::class);
    }

    public function __invoke(Request $request)
    {
        $colors = Color::all();
        return View("site.pages.colors", compact("colors"));
    }
}
