<?php

namespace App\DataTransferObjects\ModelDTO;

use App\Contracts\ModelDTO;
use App\Http\Requests\LeadsRequest;

class LeadDTO implements ModelDTO
{
    public function __construct(
        public readonly string $name,
        public readonly string $contact_info,
        public readonly ?string $message,
    ) {
    }

    public static function appRequest(LeadsRequest $request): LeadDTO
    {
        return new LeadDTO(
            $request['name'],
            $request['contact_info'],
            $request['message']
        );
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'contact_info' => $this->contact_info,
            'message' => $this->message,
        ];
    }
}
