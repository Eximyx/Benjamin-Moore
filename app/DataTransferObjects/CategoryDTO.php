<?php

namespace App\DataTransferObjects;

use App\Contracts\BaseDTO;
use App\Http\Requests\CreateCategoryRequest;

class CategoryDTO implements BaseDTO
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
