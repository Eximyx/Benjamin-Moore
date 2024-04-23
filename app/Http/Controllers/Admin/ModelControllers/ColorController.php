<?php

namespace App\Http\Controllers\Admin\ModelControllers;

use App\DataTransferObjects\ModelDTO\ColorDTO;
use App\Http\Requests\ColorRequest;
use App\Http\Resources\ModelResources\ColorResource;
use App\Http\Resources\SettingsResources\SettingsResource;
use App\Models\Settings;
use App\Services\Admin\ModelServices\ColorService;
use App\Traits\MetaDataTrait;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\View\View;

class ColorController extends BaseAdminController
{
    protected SettingsResource $settings;

    use MetaDataTrait;

    /**
     * @param ColorService $service
     */
    public function __construct(ColorService $service)
    {
        parent::__construct($service, ColorDTO::class, ColorResource::class, ColorRequest::class);
        $this->settings = SettingsResource::make(app(Settings::class));
    }

    /**
     * @return View
     *
     */
    public function __invoke(): View
    {
        return view('site.pages.colors',
            [
                'data' => JsonResource::make(
                    [
                        'colors' => ColorResource::collection($this->service->getOrderedByHexColor()),
                        'settings' => $this->settings,
                        'meta' => $this->getMetaDataByURL(),
                    ])
            ]);
    }
}
