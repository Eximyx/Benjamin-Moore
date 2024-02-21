<?php

namespace App\DataTransferObjects\ModelDTO;

use App\Contracts\ModelDTO;
use App\Http\Requests\CreateAdminRequest;

class AdminDTO implements ModelDTO
{
    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly string $password,
        public readonly string $user_role_id,
    )
    {
    }

    public static function appRequest(CreateAdminRequest $request): AdminDTO
    {
        return new AdminDTO(
            $request['name'],
            $request['email'],
            $request['password'],
            $request['user_role_id']
        );

    }
}
