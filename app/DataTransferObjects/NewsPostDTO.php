<?php

namespace App\DataTransferObjects;

use App\Http\Requests\CreateNewsPostRequest;
use Illuminate\Http\Request;

class NewsPostDTO
{
    public function __construct(
        public readonly string $title,
        public readonly string $description,
        public readonly string $category_id,
        public readonly string $content,
        public readonly string $main_image,
    ) {

    }

    public static function AppRequest(CreateNewsPostRequest $request)
    {
        return new NewsPostDTO(
            $request->input('title'),
            $request->input('description'),
            $request->input('category_id'),
            $request->input('content'),
            $request->input('main_image'),
        );

    }

}