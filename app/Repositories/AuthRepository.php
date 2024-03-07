<?php

namespace App\Repositories;

use App\Models\User;

class AuthRepository
{
    /**
     * @param  array<string,mixed>  $dto
     */
    public function update(User $entity, array $dto): User
    {
        return tap($entity)->update($dto);
    }

    public function getUserById(string $id): User
    {
        return User::findOrFail($id);
    }
}
