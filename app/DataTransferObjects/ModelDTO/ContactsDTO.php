<?php

namespace App\DataTransferObjects\ModelDTO;

use App\Http\Requests\ContactsRequest;

class ContactsDTO
{
    public function __construct(
        public readonly string $email,
        public readonly string $phone,
        public readonly string $work_time,
        public readonly string $location,
        public readonly string $instagram,
    ) {

    }

    public static function appRequest(ContactsRequest $request): ContactsDTO
    {
        return new ContactsDTO(
            $request['email'],
            $request['phone'],
            $request['work_time'],
            $request['location'],
            $request['instagram']
        );

    }
}
