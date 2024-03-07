<?php

namespace App\Http\Controllers\ModelControllers;

use App\DataTransferObjects\ModelDTO\ReviewDTO;
use App\Http\Requests\ReviewRequest;
use App\Http\Resources\ReviewResource;
use App\Services\ModelServices\ReviewService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReviewController extends BaseAdminController
{
    public function __construct(ReviewService $service)
    {
        parent::__construct($service, ReviewDTO::class, ReviewResource::class, ReviewRequest::class);
    }

    public function toggle(Request $request): JsonResource
    {
        $entity = $this->service->toggle($request);

        return $this->resource::make($entity);
    }
}
