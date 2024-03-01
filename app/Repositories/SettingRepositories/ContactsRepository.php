<?php

namespace App\Repositories\SettingRepositories;

use App\Models\Settings;

class ContactsRepository
{
    public function first(): ?Settings
    {
        $entity = Settings::first();
        if ($entity === null) {
            $entity = Settings::create(['id' => 1]);
        }

        return $entity;
    }

    /**
     * @param array<string,mixed> $data
     */
    public function updateOrCreate(array $data): Settings
    {
        $entity = $this->first();
        if (isset($entity)) {
            return tap($entity)->update($data);
        } else {
            return Settings::create($data);
        }
    }
}
