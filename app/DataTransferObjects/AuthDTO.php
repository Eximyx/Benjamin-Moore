<?php

namespace App\DataTransferObjects;

use App\Contracts\ModelDTO;
use App\Http\Requests\AuthRequest;

class AuthDTO implements ModelDTO
{
    /**
     * @param string $name
     * @param string $email
     * @param string $password
     */
    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly string $password,
    )
    {
    }

    /**
     * @param AuthRequest $request
     * @return AuthDTO
     */
    public static function appRequest(AuthRequest $request): AuthDTO
    {
        return new AuthDTO(
            $request['name'],
            $request['email'],
            $request['password'],
        );

    }

    /**
     * @return array|mixed[]
     */
    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
        ];
    }
}
