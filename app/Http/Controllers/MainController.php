<?php

namespace App\Http\Controllers;

use App\Http\Resources\BannerResource;
use App\Http\Resources\ContactsResource;
use App\Http\Resources\MainResource;
use App\Http\Resources\PartnersResource;
use App\Http\Resources\SectionResource;
use App\Http\Resources\SettingsResource;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Services\MainService;
use App\Traits\MetadataTrait;
use Illuminate\Contracts\View\View;
use Illuminate\Routing\Controller;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class MainController extends Controller
{
    use MetadataTrait;

    protected SettingsResource $settings;

    public function __construct(
        protected MainService $service,
    ) {
        $this->settings = $this->getSettings();
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
            'reviews' => $this->service->reviewsWrapper(5),
            'banners' => BannerResource::collection($this->service->getBannersForMain()),
            'sections' => SectionResource::collection($this->service->getSectionsForMain()),
            'settings' => $this->settings,
            'meta' => $this->getMetaDataByRequest(),
        ]);

        return view('frontend.main',
            [
                'data' => $data,
                'meta' => $this->getMetaDataByRequest(),

            ]
        );
    }

    public function calc(): View
    {
        return view('frontend.calculator',
            [
                'data' => [
                    'settings' => $this->settings,
                    'meta' => $this->getMetaDataByRequest(),
                ],
            ]
        );
    }

    public function catalog(): View
    {
        return view('frontend.catalog',
            [
                'data' => [
                    'products' => Product::paginate(10),
                    'colors' => Color::all(),
                    'productCategories' => ProductCategory::all(),
                    'settings' => $this->settings,
                    'meta' => $this->getMetaDataByRequest(),
                ],
            ]
        );
    }

    public function contacts(): View
    {
        $data = ContactsResource::make([
            'data' => PartnersResource::collection($this->service->getPartners()),
            'settings' => $this->settings,
            'banner' => BannerResource::make($this->service->getBannerByPositionId(2)),
            'meta' => $this->getMetaDataByRequest(),
        ]);

        return view('frontend.contacts',
            [
                'data' => $data,
            ]
        );
    }
}
