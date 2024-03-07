<?php

namespace App\DataTransferObjects\ModelDTO;

use App\Contracts\ModelDTO;

class UpdateMetaDataDTO implements ModelDTO
{
    public function __construct(
        public readonly string $url,
        public readonly string $title,
    ) {

    }

    /**
     * @param  array<string, string>  $data
     */
    public static function appRequest(array $data): UpdateMetaDataDTO
    {
        return new UpdateMetaDataDTO(
            $data['url'],
            $data['title'],
        );

    }

    /**
     * @return array<string|int, mixed>
     */
    public function toArray(): array
    {
        return [
            'url' => $this->url,
            'title' => $this->title,
        ];
    }
}
