<?php

namespace App\DataTransferObjects;

use App\Contracts\ModelDTO;
use App\Http\Requests\CreateCategoryRequest;

class CategoryDTO implements ModelDTO
{
    public function __construct(
        public readonly string $title,
    )
    {
    }

    public static function appRequest(CreateCategoryRequest $request): CategoryDTO
    {
        return new CategoryDTO(
            $request['title'],
        );
    }
}
