<?php

namespace App\DataTransferObjects\ModelDTO;

use App\Contracts\ModelDTO;
use App\Http\Requests\NewsPostRequest;

class NewsPostDTO implements ModelDTO
{
    /**
     * @param string $title
     * @param string $description
     * @param string|null $category_id
     * @param string|null $content
     * @param mixed $main_image
     */
    public function __construct(
        public readonly string  $title,
        public readonly string  $description,
        public readonly ?string $category_id,
        public ?string          $content,
        public mixed            $main_image,
    )
    {
    }

    /**
     * @param NewsPostRequest $request
     * @return NewsPostDTO
     */
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

    /**
     * @return array|mixed[]
     */
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
