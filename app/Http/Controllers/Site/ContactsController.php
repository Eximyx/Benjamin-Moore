<?php

namespace App\Http\Controllers\Site;

use App\Http\Resources\ModelResources\BannerResource;
use App\Http\Resources\ModelResources\PartnersResource;
use App\Http\Resources\SettingsResources\SettingsResource;
use App\Models\Settings;
use App\Services\Site\ContactsService;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Routing\Controller;
use Illuminate\View\View;

class ContactsController extends Controller
{
    protected SettingsResource $settings;

    public function __construct(
        protected ContactsService $service,
    )
    {
        $this->settings = SettingsResource::make(app(Settings::class));
    }

    public function __invoke(): View
    {
        return view('site.pages.contacts', [
            'data' => JsonResource::make([
                'partners' => PartnersResource::collection($this->service->getPartners()),
                'banner' => BannerResource::make($this->service->getBannerByPositionId(3)),
                'settings' => $this->settings,
                'meta' => $this->service->metaDataFindByURL(),
            ]),
        ]);
    }
}
