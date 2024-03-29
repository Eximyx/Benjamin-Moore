<?php

namespace App\DataTransferObjects\ModelDTO;

use App\Contracts\ModelDTO;
use App\Http\Requests\ProductCategoryRequest;

class ProductCategoryDTO implements ModelDTO
{
    public function __construct(
        public readonly string  $title,
        public readonly ?string $kind_of_work_id,
    )
    {
    }

    public static function appRequest(ProductCategoryRequest $request): ProductCategoryDTO
    {
        return new ProductCategoryDTO(
            $request['title'],
            $request['kind_of_work_id'],
        );
    }

    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'kind_of_work_id' => $this->kind_of_work_id,
        ];
    }
}
