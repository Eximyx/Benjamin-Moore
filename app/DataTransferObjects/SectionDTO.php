<?php

namespace App\DataTransferObjects;

use App\Contracts\ModelDTO;
use App\Http\Requests\CreateProductRequest;

class SectionDTO implements ModelDTO
{
    public function __construct(
        public readonly string $title,
        public readonly string $content,
    )
    {

    }

    public static function appRequest(CreateProductRequest $request): SectionDTO
    {
        return new SectionDTO(
            $request['title'],
            $request['content'],
        );

    }
}
