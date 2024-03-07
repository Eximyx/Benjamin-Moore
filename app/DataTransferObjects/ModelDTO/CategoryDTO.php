<?php

namespace App\DataTransferObjects\ModelDTO;

use App\Contracts\ModelDTO;
use App\Http\Requests\NewsCategoryRequest;

class CategoryDTO implements ModelDTO
{
    public function __construct(
        public readonly string $title,
    )
    {
    }

    public static function appRequest(NewsCategoryRequest $request): CategoryDTO
    {
        return new CategoryDTO(
            $request['title'],
        );
    }
}
