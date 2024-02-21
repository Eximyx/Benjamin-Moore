<?php

namespace App\Http\Controllers\ModelControllers;

use App\DataTransferObjects\ReviewDTO;
use App\Http\Requests\CreateReviewRequest;
use App\Http\Resources\ReviewResource;
use App\Services\ModelServices\ReviewService;

class ReviewController extends BaseAdminController
{
    public function __construct(
        ReviewService $service
    )
    {
        parent::__construct($service, ReviewDTO::class, ReviewResource::class, CreateReviewRequest::class);
    }
}
