<?php

namespace App\Http\Controllers;

use App\DataTransferObjects\ReviewDTO;
use App\Http\Requests\CreateReviewRequest;
use App\Http\Resources\ReviewResource;
use App\Services\ModelServices\ReviewServiceBase;

class ReviewController extends BaseAdminController
{
    public function __construct(
        ReviewServiceBase $service
    )
    {
        parent::__construct($service, ReviewDTO::class, ReviewResource::class, CreateReviewRequest::class);
    }
}