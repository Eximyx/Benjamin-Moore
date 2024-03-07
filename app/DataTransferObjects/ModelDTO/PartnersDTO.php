<?php

namespace App\DataTransferObjects\ModelDTO;

use App\Contracts\ModelDTO;
use App\Http\Requests\PartnersRequest;

class PartnersDTO implements ModelDTO
{
    public function __construct(
        public readonly string $title,
        public readonly string $location,
    )
    {

    }

    public static function appRequest(PartnersRequest $request): PartnersDTO
    {
        return new PartnersDTO(
            $request['title'],
            $request['location'],
        );

    }
}
