<?php

namespace App\DataTransferObjects;

use App\Contracts\ModelDTO;
use App\Http\Requests\ProfileRequest;

class ProfileDTO implements ModelDTO
{
    /**
     * @param string $name
     * @param string $email
     * @param string|null $password
     */
    public function __construct(
        public readonly string  $name,
        public readonly string  $email,
        public readonly ?string $password,
    )
    {
    }

    /**
     * @param ProfileRequest $request
     * @return ProfileDTO
     */
    public static function appRequest(ProfileRequest $request): ProfileDTO
    {
        return new ProfileDTO(
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
        $array = [
            'name' => $this->name,
            'email' => $this->email,
        ];

        if ($this->password !== null) {
            $array['password'] = $this->password;
        }

        return $array;
    }
}
