<?php

namespace App\DataTransferObjects\ModelDTO;

use App\Contracts\BaseDTO;
use App\Contracts\ModelDTO;
use App\Http\Requests\CreateColorRequest;

class ColorDTO implements ModelDTO
{
    public function __construct(
        public readonly string $title,
        public readonly string $hex_code,
    )
    {
    }

    public static function appRequest(CreateColorRequest $request): ColorDTO
    {
        return new ColorDTO(
            $request['title'],
            $request['hex_code'],
        );
    }
}
