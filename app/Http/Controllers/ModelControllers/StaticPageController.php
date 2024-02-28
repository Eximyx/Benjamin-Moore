<?php

namespace App\Http\Controllers\ModelControllers;

use App\DataTransferObjects\ModelDTO\StaticPageDTO;
use App\Http\Requests\CreateStaticPageRequest;
use App\Http\Resources\StaticPageResource;
use App\Services\ModelServices\StaticPageService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StaticPageController extends BaseAdminController
{
    public function __construct(StaticPageService $service)
    {
        parent::__construct($service, StaticPageDTO::class, StaticPageResource::class, CreateStaticPageRequest::class
        );
    }

    public function toggle(Request $request): JsonResource
    {
        $entity = $this->service->toggle($request);

        return $this->resource::make($entity);
    }
}
