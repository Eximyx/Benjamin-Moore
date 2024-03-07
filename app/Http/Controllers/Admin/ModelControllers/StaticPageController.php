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

    public function __construct(
        StaticPageService $service,
    )
    {
        parent::__construct($service, StaticPageDTO::class, StaticPageResource::class, StaticPageRequest::class
        );
        $this->settings = SettingsResource::make(app(Settings::class));
    }

    public function showBySlug(string $slug): View
    {
        $entity = $this->service->findBySlug($slug);

        $data = JsonResource::make([
            'entity' => StaticPageResource::make($entity),
            'settings' => $this->settings,
            'meta' => $this->getMetaDataByURL(),
        ]);

        return view('frontend.static-page', ['data' => $data]);
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

    public function toggle(Request $request): JsonResource
    {
        $entity = $this->service->toggle($request);

        return $this->resource::make($entity);
    }
}
