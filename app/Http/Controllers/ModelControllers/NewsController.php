<?php

namespace App\Http\Controllers\ModelControllers;

use App\DataTransferObjects\ModelDTO\NewsPostDTO;
use App\Http\Requests\CreateNewsPostRequest;
use App\Http\Resources\NewsPostResource;
use App\Http\Resources\NewsShowResource;
use App\Http\Resources\SettingsResource;
use App\Services\ModelServices\NewsService;
use App\Traits\MetadataTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\View\View;

class NewsController extends BaseAdminController
{
    use MetadataTrait;

    protected SettingsResource $settings;

    public function __construct(NewsService $service)
    {
        parent::__construct($service, NewsPostDTO::class, NewsPostResource::class, CreateNewsPostRequest::class);
        $this->settings = $this->getSettings();
    }

    public function toggle(Request $request): JsonResource
    {
        $entity = $this->service->toggle($request);

        return $this->resource::make($entity);
    }

    public function news(): View
    {
        $newsPosts = $this->service->paginate();

        return view('frontend.news',
            [
                'data' => SettingsResource::make(
                    [
                        'newsPosts' => $newsPosts,
                        'settings' => $this->settings,
                        'meta' => $this->getMetaDataByRequest()
                    ]
                ),
            ]);
    }

    public function showBySlug(string $slug): View
    {
        $entity = $this->service->findBySlug($slug);
        //        dd(NewsPostResource::make($entity));
        $resource = NewsShowResource::make([
                'entity' => $entity,
                'latest' => $this->service->getLatest(),
                'settings' => $this->settings,
                'meta' => $this->getMetaDataByRequest()
            ]
        );
        dd($resource);

        return view('frontend.news-details', compact('resource'));
    }
}
