<?php

namespace App\DataTransferObjects;

use App\Contracts\ModelDTO;
use App\Http\Requests\ToggleBannerRequest;

class ToggleBannersDTO implements ModelDTO
{
    /**
     * @param array<int> $active_items
     */
    public function __construct(
        public readonly array $active_items,
    )
    {
    }

    public static function appRequest(ToggleBannerRequest $request): ToggleBannersDTO
    {
        return new ToggleBannersDTO(
            $request['active_items'],
        );
    }
}
