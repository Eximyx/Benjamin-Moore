<?php

namespace App\DataTransferObjects\ModelDTO;

use App\Contracts\ModelDTO;
use App\Http\Requests\CreateStaticPageRequest;

class StaticPageDTO implements ModelDTO
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
