<?php

namespace App\DataTransferObjects\ModelDTO;

use App\Contracts\ModelDTO;
use App\Http\Requests\AdminRequest;

class AdminDTO implements ModelDTO
{
    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly string $password,
        public readonly string $user_role_id,
    ) {
    }

    public static function appRequest(AdminRequest $request): AdminDTO
    {
        return new AdminDTO(
            $request['name'],
            $request['email'],
            $request['password'],
            $request['user_role_id'] ?? 1
        );
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'user_role_id' => $this->user_role_id,
        ];
    }
}
