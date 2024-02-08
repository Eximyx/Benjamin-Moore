<?php

namespace App\DataTransferObjects;

use App\Contracts\BaseDTO;
use App\Http\Requests\CreateLeadsRequest;

class LeadDTO implements BaseDTO
{
    public function __construct(
        public readonly string $name,
        public readonly string $contactInfo,
        public readonly string $message,
    )
    {
    }

    public static function appRequest(CreateLeadsRequest $request): LeadDTO
    {
        return new LeadDTO(
            $request['name'],
            $request['contactInfo'],
            $request['message']
        );
    }
}
