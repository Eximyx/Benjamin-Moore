<?php

namespace App\DataTransferObjects;

use App\Contracts\BaseDTO;
use App\Http\Requests\CreateReviewRequest;

class ReviewDTO implements BaseDTO
{
    public function __construct(
        public readonly string $title,
        public readonly string $description,
        public mixed           $main_image,
    )
    {
    }

    public static function appRequest(CreateReviewRequest $request): ReviewDTO
    {
        return new ReviewDTO(
            $request['title'],
            $request['description'],
            $request['main_image']
        );
    }
}
