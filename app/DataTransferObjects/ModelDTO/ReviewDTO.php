<?php

namespace App\DataTransferObjects\ModelDTO;

use App\Contracts\ModelDTO;
use App\Http\Requests\ReviewRequest;

class ReviewDTO implements ModelDTO
{
    /**
     * @param string $name
     * @param string|null $description
     */
    public function __construct(
        public readonly string  $name,
        public readonly ?string $description,
    )
    {
    }

    /**
     * @param ReviewRequest $request
     * @return ReviewDTO
     */
    public static function appRequest(ReviewRequest $request): ReviewDTO
    {
        return new ReviewDTO(
            $request['name'],
            $request['description'],
        );
    }

    /**
     * @return array|mixed[]
     */
    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
        ];
    }
}
