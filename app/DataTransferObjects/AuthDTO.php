<?php

namespace App\DataTransferObjects;

use App\Contracts\ModelDTO;
use App\Http\Requests\AuthRequest;

class AuthDTO implements ModelDTO
{
    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly string $password,
    )
    {

    }

    public static function appRequest(AuthRequest $request): AuthDTO
    {
        return new AuthDTO(
            $request['name'],
            $request['email'],
            $request['password'],
        );

    }
}
