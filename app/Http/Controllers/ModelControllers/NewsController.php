<?php

namespace App\Http\Controllers\ModelControllers;

use App\DataTransferObjects\ModelDTO\NewsPostDTO;
use App\Http\Requests\NewsPostRequest;
use App\Http\Resources\NewsPostResource;
use App\Http\Resources\SettingsResource;
use App\Models\Settings;
use App\Services\ModelServices\NewsService;
use App\Traits\MetaDataTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\View\View;

class NewsController extends BaseAdminController
{
    protected SettingsResource $settings;

    use MetaDataTrait;

    public function __construct(
        NewsService $service,
    )
    {
        parent::__construct($service, NewsPostDTO::class, NewsPostResource::class, NewsPostRequest::class);
        $this->settings = SettingsResource::make(app(Settings::class));
    }

    public function toggle(Request $request): JsonResource
    {
        $entity = $this->service->toggle($request);

        return $this->resource::make($entity);
    }

    public function update(Request $request): JsonResource
    {
        $entity = $this->service->findById($request['id']);

        $slug = $entity->slug;

        $request = app($this->request, $request->input());

        $entity = $this->service->update(
            $entity,
            $this->dto::appRequest($request)
        );

        $this->updateMetaData($slug, $entity);

        return $this->resource::make($entity);
    }

    public function store(Request $request): JsonResource
    {
        $request = app($this->request, $request->all());

        $dto = $this->dto::AppRequest(
            $request
        );

        $entity = $this->service->create($dto);
        $this->createMetaData($entity);

        return $this->resource::make($entity);
    }

    public function news(): View
    {
        return view('frontend.news',
            [
                'data' => SettingsResource::make(
                    [
                        'newsPosts' => $this->service->getLatest()->paginate(9),
                        'settings' => $this->settings,
                        'meta' => $this->getMetaDataByUrl(),
                    ]
                ),
            ]);
    }

    public function showBySlug(string $slug): View
    {
        $entity = $this->service->findBySlug($slug);

        $data = JsonResource::make([
                'entity' => NewsPostResource::make($entity),
                'latest' => NewsPostResource::collection(
                    $this->service->getLatest(3)->get()
                ),
                'settings' => $this->settings,
                'meta' => $this->getMetaDataByURL(),
            ]
        );

        return view('frontend.news-details', ['data' => $data]);
    }
}
