<?php

namespace App\DataTransferObjects\ModelDTO;

use App\Contracts\ModelDTO;
use App\Http\Requests\CreateMetaDataRequest;

class MetaDataDTO implements ModelDTO
{
    public function __construct(
        public readonly ?string $meta_description,
        public readonly ?string $meta_keywords,
        public readonly ?string $h,
        public readonly ?string $additional_text,
    ) {
    }

    public static function appRequest(CreateMetaDataRequest $request): MetaDataDTO
    {
        return new MetaDataDTO(
            $request['meta_description'],
            $request['meta_keywords'],
            $request['h'],
            $request['additional_text'],
        );
    }

    public function toArray(): array
    {
        return [
            'meta_description' => $this->meta_description,
            'meta_keywords' => $this->meta_keywords,
            'h' => $this->h,
            'additional_text' => $this->additional_text,
        ];
    }
}
