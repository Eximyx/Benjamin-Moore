<?php

namespace App\Http\Controllers\Admin\ModelControllers;

use App\DataTransferObjects\ModelDTO\NewsPostDTO;
use App\Http\Requests\NewsPostRequest;
use App\Http\Resources\ModelResources\NewsPostResource;
use App\Http\Resources\SettingsResources\SettingsResource;
use App\Models\Settings;
use App\Services\Admin\ModelServices\MetaDataService;
use App\Services\Admin\ModelServices\NewsService;
use App\Traits\MetaDataTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\View\View;

class NewsController extends BaseAdminController
{
    protected SettingsResource $settings;

    use MetaDataTrait;

    /**
     * @param MetaDataService $metaDataService
     * @param NewsService $service
     */
    public function __construct(
        protected MetaDataService $metaDataService,
        NewsService               $service,
    )
    {
        parent::__construct($service, NewsPostDTO::class, NewsPostResource::class, NewsPostRequest::class);
        $this->settings = SettingsResource::make(app(Settings::class));
    }

    /**
     * @param Request $request
     * @return JsonResource
     */
    public function toggle(Request $request): JsonResource
    {
        $entity = $this->service->toggle($request);

        return $this->resource::make($entity);
    }

    /**
     * @param string $id
     * @param Request $request
     * @return JsonResource
     */
    public function update(string $id, Request $request): JsonResource
    {
        $entity = $this->service->findById($id);

        $slug = $entity->slug;

        $request = app($this->request, $request->input());

        $entity = $this->service->update(
            $entity,
            $this->dto::appRequest($request)
        );

        $this->updateMetaData($slug, $entity);

        return $this->resource::make($entity);
    }

    /**
     * @param Request $request
     * @return JsonResource
     */
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

    /**
     * @return View
     */
    public function __invoke(): View
    {
        return view('site.pages.news',
            [
                'data' => JsonResource::make(
                    [
                        'newsPosts' => $this->service->getLatest()->paginate(9),
                        'settings' => $this->settings,
                        'meta' => $this->getMetaDataByUrl(),
                    ]
                ),
            ]);
    }

    /**
     * @param string $slug
     * @return View
     */
    public function show(string $slug): View
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

        return view('site.pages.news-details', ['data' => $data]);
    }

    /**
     * @param Request $request
     * @return JsonResource
     */
    public function destroy(Request $request): JsonResource
    {
        $entity = $this->service->destroy($request);

        $this->deleteMetaData($entity);

        return $this->resource::make($entity);
    }
}
