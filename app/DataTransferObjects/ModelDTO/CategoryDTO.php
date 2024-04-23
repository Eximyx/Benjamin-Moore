<?php

namespace App\DataTransferObjects\ModelDTO;

use App\Contracts\ModelDTO;
use App\Http\Requests\NewsCategoryRequest;

class CategoryDTO implements ModelDTO
{
    /**
     * @param string $title
     */
    public function __construct(
        public readonly string $title,
    )
    {
    }

    /**
     * @param NewsCategoryRequest $request
     * @return CategoryDTO
     */
    public static function appRequest(NewsCategoryRequest $request): CategoryDTO
    {
        return new CategoryDTO(
            $request['title'],
        );
    }

    /**
     * @return string[]
     */
    public function toArray(): array
    {
        return [
            'title' => $this->title,
        ];
    }
}
