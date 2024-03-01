<?php

namespace App\Http\Controllers\ModelControllers;

use App\DataTransferObjects\ModelDTO\NewsPostDTO;
use App\Http\Requests\CreateNewsPostRequest;
use App\Http\Resources\NewsPostResource;
use App\Http\Resources\NewsShowResource;
use App\Services\ModelServices\NewsService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\View\View;

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

    public function news(): View
    {
        $newsPosts = $this->service->paginate();

        return view('frontend.news', compact('newsPosts'));
    }

    public function showBySlug(string $slug): View
    {
        $entity = $this->service->findBySlug($slug);

        $resource = NewsShowResource::make([
                'entity' => $entity,
                'latest' => $this->service->getLatest(),
            ]
        );

        return view('frontend.products-details', compact('resource'));
    }
}
