<?php

namespace App\DataTransferObjects\ModelDTO;

use App\Contracts\ModelDTO;
use App\Http\Requests\CreateProductCategoryRequest;

class ProductCategoryDTO implements ModelDTO
{
    public function __construct(
        public readonly string  $title,
        public readonly string  $content,
        public readonly ?string $kind_of_work_id,
    )
    {
    }

    public static function appRequest(CreateProductCategoryRequest $request): ProductCategoryDTO
    {
        return new ProductCategoryDTO(
            $request['title'],
            $request['content'],
            $request['kind_of_work_id'],
        );

    }
}
