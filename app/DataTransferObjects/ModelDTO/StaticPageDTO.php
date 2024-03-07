<?php

namespace App\DataTransferObjects\ModelDTO;

use App\Contracts\ModelDTO;
use App\Http\Requests\StaticPageRequest;

class StaticPageDTO implements ModelDTO
{
    public function __construct(
        public readonly string $title,
        public string          $content,
    )
    {

    }

    public static function appRequest(StaticPageRequest $request): StaticPageDTO
    {
        return new StaticPageDTO(
            $request['title'],
            $request['content'],
        );

    }
}
