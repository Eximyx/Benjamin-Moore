<?php

namespace App\DataTransferObjects\ModelDTO;

use App\Contracts\ModelDTO;
use App\Http\Requests\ColorRequest;

class ColorDTO implements ModelDTO
{
    /**
     * @param string $title
     * @param string $hex_code
     */
    public function __construct(
        public readonly string $title,
        public readonly string $hex_code,
    )
    {
    }

    /**
     * @param ColorRequest $request
     * @return ColorDTO
     */
    public static function appRequest(ColorRequest $request): ColorDTO
    {
        return new ColorDTO(
            $request['title'],
            $request['hex_code'],
        );
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'hex_code' => $this->hex_code,
        ];
    }
}
