<?php

namespace App\DataTransferObjects\ModelDTO;

use App\Contracts\ModelDTO;
use App\Http\Requests\NewsPostRequest;

class NewsPostDTO implements ModelDTO
{
    public function __construct(
        public readonly string $title,
        public readonly string $description,
        public readonly ?string $category_id,
        public ?string $content,
        public mixed $main_image,
    ) {
    }

    public static function appRequest(NewsPostRequest $request): NewsPostDTO
    {
        return new NewsPostDTO(
            $request['title'],
            $request['description'],
            $request['category_id'],
            $request['content'],
            $request['main_image']
        );

    }

    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'category_id' => $this->category_id,
            'content' => $this->content,
            'main_image' => $this->main_image,
        ];
    }
}
