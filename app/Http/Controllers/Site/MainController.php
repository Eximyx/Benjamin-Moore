<?php

namespace App\Http\Controllers\Site;

use App\Http\Resources\ModelResources\BannerResource;
use App\Http\Resources\ModelResources\NewsPostResource;
use App\Http\Resources\ModelResources\ProductResource;
use App\Http\Resources\ModelResources\ReviewResource;
use App\Http\Resources\ModelResources\SectionResource;
use App\Http\Resources\SettingsResources\SettingsResource;
use App\Models\Settings;
use App\Services\Site\MainService;
use App\Traits\MetaDataTrait;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Routing\Controller;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class MainController extends Controller
{
    /**
     * @var SettingsResource
     */
    protected SettingsResource $settings;

    use MetaDataTrait;

    /**
     * @param MainService $service
     */
    public function __construct(
        protected MainService $service,
    )
    {
        $this->settings = SettingsResource::make(app(Settings::class));
    }

    /**
     * @return View|JsonResource
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function __invoke(): View|JsonResource
    {
        $data = [
            'news' => NewsPostResource::collection($this->service->getLatestNews()),
            'products' => ProductResource::collection($this->service->getLatestProducts()),
            'reviews' => ReviewResource::collection($this->service->getLatestReviews()),
            'banners' => BannerResource::collection($this->service->getBannersForMain()),
            'sections' => SectionResource::collection($this->service->getSectionsForMain()),
            'settings' => $this->settings,
            'meta' => $this->getMetaDataByURL(),
        ];

        return view('site.pages.main', compact('data'));
    }
}
