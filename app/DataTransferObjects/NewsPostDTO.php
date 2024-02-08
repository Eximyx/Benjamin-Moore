<?php

namespace App\DataTransferObjects;

use App\Contracts\BaseDTO;
use App\Http\Requests\CreateNewsPostRequest;

class NewsPostDTO implements BaseDTO
{
    public function __construct(
        public readonly string $title,
        public readonly string $description,
        public readonly string $category_id,
        public readonly string $content,
        public mixed           $main_image,
    )
    {

    }

    public static function appRequest(CreateNewsPostRequest $request): NewsPostDTO
    {
        return new NewsPostDTO(
            $request['title'],
            $request['description'],
            $request['category_id'],
            $request['content'],
            $request['main_image']
        );

    }

}
