<?php

namespace App\DataTransferObjects;

use App\Http\Requests\CreateProductCategoryRequest;

class ProductCategoryDTO extends BaseDTO
{
    public function __construct(
        public readonly string $title,
        public readonly string $content,
        public readonly string $kind_of_work_id,
    ) {

    }

    public static function appRequest(CreateProductCategoryRequest $request): ProductCategoryDTO
    {
        return new ProductCategoryDTO(
            $request->title,
            $request->content,
            $request->kind_of_work_id,
        );

    }

}