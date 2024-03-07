<?php

namespace App\DataTransferObjects\ModelDTO;

use App\Contracts\ModelDTO;
use App\Http\Requests\LeadsRequest;

class LeadDTO implements ModelDTO
{
    public function __construct(
        public readonly string $name,
        public readonly string $contactInfo,
        public readonly string $message,
    )
    {
    }

    public static function appRequest(LeadsRequest $request): LeadDTO
    {
        return new LeadDTO(
            $request['name'],
            $request['contactInfo'],
            $request['message']
        );
    }
}
