<?php

namespace App\DataTransferObjects;

use App\Contracts\BaseDTO;
use App\Http\Requests\CreateStaticPageRequest;

class StaticPageDTO implements BaseDTO
{
    public function __construct(
        public readonly string $title,
        public readonly string $content,
    )
    {

    }

    public static function appRequest(CreateStaticPageRequest $request): StaticPageDTO
    {
        return new StaticPageDTO(
            $request['title'],
            $request['content'],
        );

    }

}
