<?php

namespace App\Http\Controllers;

use App\Http\Resources\BannerResource;
use App\Http\Resources\ContactsResource;
use App\Http\Resources\MainResource;
use App\Http\Resources\PartnersResource;
use App\Http\Resources\SectionResource;
use App\Http\Resources\SettingsResource;
use App\Services\MainService;
use Illuminate\Contracts\View\View;
use Illuminate\Routing\Controller;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class MainController extends Controller
{
    protected SettingsResource $settings;

    public function __construct(
        protected MainService $service,
    )
    {
        $this->settings = SettingsResource::make($this->service->getSettings());
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function index(): View
    {
        $data = MainResource::make([
            'news' => $this->service->newsWrapper(1),
            'products' => $this->service->productsWrapper(5),
            'reviews' => $this->service->reviewsWrapper(),
            'banners' => BannerResource::collection($this->service->getBannersForMain()),
            'sections' => SectionResource::collection($this->service->getSectionsForMain()),
            'settings' => $this->settings,
        ]);

        return view('test', ['data' => $data]);
    }

    public function calc(): View
    {
        return view('frontend.calculator',
            [
                'data' => ['settings' => $this->settings]
            ]
        );
    }

    public function catalog(): View
    {
        return view('frontend.catalog');
    }

    public function contacts(): View
    {
        $data = ContactsResource::make([
            'data' => PartnersResource::collection($this->service->getPartners()),
            'settings' => $this->settings,
            'banner' => BannerResource::make($this->service->getBannerByPositionId(2)),
        ]);

        return view('frontend.contacts', ['data' => $data]);
    }
}
