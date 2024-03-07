<?php

namespace App\DataTransferObjects\ModelDTO;

use App\Contracts\BaseDTO;
use App\Contracts\ModelDTO;
use App\Http\Requests\ReviewRequest;

class ReviewDTO implements ModelDTO
{
    public function __construct(
        public readonly string $name,
        public readonly string $description,
        public mixed           $main_image,
    )
    {
    }

    public static function appRequest(ReviewRequest $request): ReviewDTO
    {
        return new ReviewDTO(
            $request['name'],
            $request['description'],
            $request['main_image']
        );
    }
}
