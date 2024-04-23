<?php

namespace App\Http\Controllers\Admin\ModelControllers;

use App\DataTransferObjects\ModelDTO\StaticPageDTO;
use App\Http\Requests\StaticPageRequest;
use App\Http\Resources\ModelResources\StaticPageResource;
use App\Http\Resources\SettingsResources\SettingsResource;
use App\Models\Settings;
use App\Services\Admin\ModelServices\StaticPageService;
use App\Traits\MetaDataTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\View\View;

class StaticPageController extends BaseAdminController
{
    protected SettingsResource $settings;

    use MetaDataTrait;

    /**
     * @param StaticPageService $service
     */
    public function __construct(
        StaticPageService $service,
    )
    {
        parent::__construct($service, StaticPageDTO::class, StaticPageResource::class, StaticPageRequest::class
        );
        $this->settings = SettingsResource::make(app(Settings::class));
    }

    /**
     * @param string $slug
     * @return View
     */
    public function show(string $slug): View
    {
        $entity = $this->service->findBySlug($slug);

        $data = JsonResource::make([
            'entity' => StaticPageResource::make($entity),
            'settings' => $this->settings,
            'meta' => $this->getMetaDataByURL(),
        ]);

        return view('site.pages.static-page', ['data' => $data]);
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
     * @param Request $request
     * @return JsonResource
     */
    public function toggle(Request $request): JsonResource
    {
        $entity = $this->service->toggle($request);

        return $this->resource::make($entity);
    }
}
