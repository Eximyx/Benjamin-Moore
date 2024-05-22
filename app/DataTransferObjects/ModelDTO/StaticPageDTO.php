<?php

namespace App\DataTransferObjects\ModelDTO;

use App\Contracts\ModelDTO;
use App\Http\Requests\StaticPageRequest;

class StaticPageDTO implements ModelDTO
{
    /**
     * @param string $title
     * @param string $content
     */
    public function __construct(
        public readonly string $title,
        public string          $content,
    )
    {
    }

    /**
     * @param StaticPageRequest $request
     * @return StaticPageDTO
     */
    public static function appRequest(StaticPageRequest $request): StaticPageDTO
    {
        return new StaticPageDTO(
            $request['title'],
            $request['content'],
        );
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'content' => $this->content,
        ];
    }
}
