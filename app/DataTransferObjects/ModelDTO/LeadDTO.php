<?php

namespace App\DataTransferObjects\ModelDTO;

use App\Contracts\ModelDTO;
use App\Http\Requests\LeadsRequest;

class LeadDTO implements ModelDTO
{
    /**
     * @param string $name
     * @param string $contact_info
     * @param string|null $message
     */
    public function __construct(
        public readonly string  $name,
        public readonly string  $contact_info,
        public readonly ?string $message,
    )
    {
    }

    /**
     * @param LeadsRequest $request
     * @return LeadDTO
     */
    public static function appRequest(LeadsRequest $request): LeadDTO
    {
        return new LeadDTO(
            $request['name'],
            $request['contact_info'],
            $request['message']
        );
    }

    /**
     * @return array|mixed[]
     */
    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'contact_info' => $this->contact_info,
            'message' => $this->message,
        ];
    }
}
