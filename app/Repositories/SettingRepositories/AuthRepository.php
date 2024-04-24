<?php

namespace App\Repositories\SettingRepositories;

use App\Models\User;

class AuthRepository
{
    /**
     * @param User $entity
     * @param array<string,mixed> $dto
     * @return User
     */
    public function update(User $entity, array $dto): User
    {
        return tap($entity)->update($dto);
    }

    /**
     * @param string $id
     * @return User
     */
    public function getUserById(string $id): User
    {
        return User::findOrFail($id);
    }
}
