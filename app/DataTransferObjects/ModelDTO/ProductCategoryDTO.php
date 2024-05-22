<?php

namespace App\DataTransferObjects\ModelDTO;

use App\Contracts\ModelDTO;
use App\Http\Requests\ProductCategoryRequest;

class ProductCategoryDTO implements ModelDTO
{
    /**
     * @param string $title
     * @param string|null $kind_of_work_id
     */
    public function __construct(
        public readonly string  $title,
        public readonly ?string $kind_of_work_id,
    )
    {
    }

    /**
     * @param ProductCategoryRequest $request
     * @return ProductCategoryDTO
     */
    public static function appRequest(ProductCategoryRequest $request): ProductCategoryDTO
    {
        return new ProductCategoryDTO(
            $request['title'],
            $request['kind_of_work_id'],
        );
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'kind_of_work_id' => $this->kind_of_work_id,
        ];
    }
}
