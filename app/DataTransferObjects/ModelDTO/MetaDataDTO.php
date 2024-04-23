<?php

namespace App\DataTransferObjects\ModelDTO;

use App\Contracts\ModelDTO;
use App\Http\Requests\CreateMetaDataRequest;

class MetaDataDTO implements ModelDTO
{
    /**
     * @param string|null $meta_description
     * @param string|null $meta_keywords
     * @param string|null $h
     * @param string|null $additional_text
     */
    public function __construct(
        public readonly ?string $meta_description,
        public readonly ?string $meta_keywords,
        public readonly ?string $h,
        public readonly ?string $additional_text,
    )
    {
    }

    /**
     * @param CreateMetaDataRequest $request
     * @return MetaDataDTO
     */
    public static function appRequest(CreateMetaDataRequest $request): MetaDataDTO
    {
        return new MetaDataDTO(
            $request['meta_description'],
            $request['meta_keywords'],
            $request['h'],
            $request['additional_text'],
        );
    }

    /**
     * @return array|mixed[]
     */
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
