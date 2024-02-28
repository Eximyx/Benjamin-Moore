<?php

namespace App\Http\Controllers\ModelControllers;

use App\DataTransferObjects\ModelDTO\NewsPostDTO;
use App\Http\Requests\CreateNewsPostRequest;
use App\Http\Resources\NewsPostResource;
use App\Services\ModelServices\NewsService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NewsController extends BaseAdminController
{
    public function __construct(NewsService $service)
    {
        parent::__construct($service, NewsPostDTO::class, NewsPostResource::class, CreateNewsPostRequest::class);
    }

    public function toggle(Request $request): JsonResource
    {
        $entity = $this->service->toggle($request);

        return $this->resource::make($entity);
    }
}
