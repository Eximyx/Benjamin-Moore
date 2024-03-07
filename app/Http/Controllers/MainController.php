<?php

namespace App\Http\Controllers;

use App\Actions\GetMetaDataByURLAction;
use App\Http\Resources\BannerResource;
use App\Http\Resources\PartnersResource;
use App\Http\Resources\SectionResource;
use App\Http\Resources\SettingsResource;
use App\Models\Settings;
use App\Services\MainService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Routing\Controller;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class MainController extends Controller
{
    protected SettingsResource $settings;

    public function __construct(
        protected MainService $service,
        protected GetMetaDataByURLAction $getMetaDataByURLAction,
    ) {
        $this->settings = SettingsResource::make(app(Settings::class));
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function index(): View|JsonResource
    {
        $data = JsonResource::make([
            'news' => $this->service->newsWrapper(1),
            'products' => $this->service->productsWrapper(5),
            'reviews' => $this->service->reviewsWrapper(5),
            'banners' => BannerResource::collection($this->service->getBannersForMain()),
            'sections' => SectionResource::collection($this->service->getSectionsForMain()),
            'settings' => $this->settings,
            'meta' => $this->getMetaDataByURLAction->__invoke(),
        ]);

        return view('frontend.main',
            [
                'data' => $data,
            ]
        );
    }

    public function calc(): View|JsonResource
    {
        return view('frontend.calculator',
            [
                'data' => JsonResource::make(
                    [
                        'settings' => $this->settings,
                        'meta' => $this->getMetaDataByURLAction->__invoke(),
                    ]
                ),
            ]
        );
    }

    public function contacts(): View
    {
        $data = JsonResource::make([
            'data' => PartnersResource::collection($this->service->getPartners()),
            'banner' => BannerResource::make($this->service->getBannerByPositionId(2)),
            'settings' => $this->settings,
            'meta' => $this->getMetaDataByURLAction->__invoke(),
        ]);

        return view('frontend.contacts',
            [
                'data' => $data,
            ]
        );
    }
}
