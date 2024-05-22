<?php

namespace App\DataTransferObjects\ModelDTO;

use App\Contracts\ModelDTO;
use App\Http\Requests\PartnersRequest;

class PartnersDTO implements ModelDTO
{
    /**
     * @param string $title
     * @param string $location
     */
    public function __construct(
        public readonly string $title,
        public readonly string $location,
    )
    {
    }

    /**
     * @param PartnersRequest $request
     * @return PartnersDTO
     */
    public static function appRequest(PartnersRequest $request): PartnersDTO
    {
        return new PartnersDTO(
            $request['title'],
            $request['location'],
        );
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'location' => $this->location,
        ];
    }
}
