<?php

namespace App\DataTransferObjects\ModelDTO;

use App\Contracts\ModelDTO;

class UpdateMetaDataDTO implements ModelDTO
{
    /**
     * @param string $url
     * @param string $title
     */
    public function __construct(
        public readonly string $url,
        public readonly string $title,
    )
    {
    }

    /**
     * @param array $data
     * @return UpdateMetaDataDTO
     */
    public static function appRequest(array $data): UpdateMetaDataDTO
    {
        return new UpdateMetaDataDTO(
            $data['url'],
            $data['title'],
        );
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'url' => $this->url,
            'title' => $this->title,
        ];
    }
}
