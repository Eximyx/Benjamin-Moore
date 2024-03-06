<?php

namespace App\DataTransferObjects\ModelDTO;

use App\Contracts\ModelDTO;

class UpdateMetaDataDTO implements ModelDTO
{
    public function __construct(
        public readonly string $url,
        public readonly string $title,
    )
    {

    }

    public static function appRequest(array $data): UpdateMetaDataDTO
    {
        return new UpdateMetaDataDTO(
            $data['url'],
            $data['title'],
        );

    }
}
