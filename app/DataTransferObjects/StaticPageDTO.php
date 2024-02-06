<?php

namespace App\DataTransferObjects;

use App\Http\Requests\CreateStaticPageRequest;

class StaticPageDTO extends BaseDTO
{
    public function __construct(
        public readonly string $title,
        public readonly string $content,
    ) {

    }

    public static function appRequest(CreateStaticPageRequest $request) : StaticPageDTO
    {
        return new StaticPageDTO(
            $request->title,
            $request->content,
        );

    }

}