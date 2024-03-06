<?php

namespace App\Http\Controllers\ModelControllers;

use App\DataTransferObjects\ModelDTO\StaticPageDTO;
use App\Http\Requests\CreateStaticPageRequest;
use App\Http\Resources\SettingsResource;
use App\Http\Resources\StaticPageResource;
use App\Services\ModelServices\StaticPageService;
use App\Traits\MetadataTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\View\View;

class StaticPageController extends BaseAdminController
{
    use MetadataTrait;

    protected SettingsResource $settings;

    public function __construct(StaticPageService $service)
    {
        parent::__construct($service, StaticPageDTO::class, StaticPageResource::class, CreateStaticPageRequest::class
        );
        $this->settings = $this->getSettings();
    }

    public function showBySlug(string $slug): View
    {
        $entity = $this->service->findBySlug($slug);

        $data = StaticPageResource::make([
            'entity' => $entity,
            'settings' => $this->settings,
            'meta' => $this->getMetaDataByRequest(),
        ]);
        return view('frontend.static-page', ['data' => $data]);
    }

    public function update(Request $request): JsonResource
    {
        $entity = $this->service->findById($request['id']);
        $slug = $entity->slug;

        $request = app($this->request, $request->all());

        $entity = $this->service->update(
            $entity,
            $this->dto::appRequest($request)
        );

        $this->updateMetaDataUrl($slug, $entity->only(['slug', 'title']));

        return $this->resource::make($entity);
    }


    public function toggle(Request $request): JsonResource
    {
        $entity = $this->service->toggle($request);

        return $this->resource::make($entity);
    }
}
