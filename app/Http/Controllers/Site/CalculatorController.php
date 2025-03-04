<?php

namespace App\Http\Controllers\Site;

use App\Http\Resources\SettingsResources\SettingsResource;
use App\Models\Settings;
use App\Services\Site\CalculatorService;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Routing\Controller;
use Illuminate\View\View;

class CalculatorController extends Controller
{
    /**
     * @var SettingsResource
     */
    protected SettingsResource $settings;

    /**
     * @param CalculatorService $service
     */
    public function __construct(
        protected CalculatorService $service,
    )
    {
        $this->settings = SettingsResource::make(app(Settings::class));
    }

    /**
     * @return View
     */
    public function __invoke(): View
    {
        return view('site.pages.calculator', [
            'data' => JsonResource::make([
                'settings' => $this->settings,
                'meta' => $this->service->metaDataFindByURL(),
            ]),
        ]);
    }
}
