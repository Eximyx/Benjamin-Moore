<?php

namespace App\DataTransferObjects;

use App\Http\Requests\CreateCategoryRequest;

class CategoryDTO extends BaseDTO
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
