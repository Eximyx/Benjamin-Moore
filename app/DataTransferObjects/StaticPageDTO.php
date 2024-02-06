<?php

namespace App\DataTransferObjects;

use App\Http\Requests\CreateNewsPostRequest;

class NewsPostDTO extends BaseDTO
{
    public function __construct(
        public readonly string $title,
        public readonly string $content,
    ) {

    }

    public static function appRequest(CreateNewsPostRequest $request)
    {
        return new NewsPostDTO(
            $request->title,
            $request->description,
            $request->category_id,
            $request->content,
            $request->main_image
        );

    }

}