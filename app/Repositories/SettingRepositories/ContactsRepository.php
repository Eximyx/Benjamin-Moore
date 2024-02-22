<?php

namespace App\Repositories\SettingRepositories;

use App\Models\Contacts;

class ContactsRepository
{
    public function first(): ?Contacts
    {
        $entity = Contacts::first();
        if ($entity === null) {
            $entity = Contacts::create(['id' => 1]);
        }

        return $entity;
    }

    /**
     * @param  array<string,mixed>  $data
     */
    public function updateOrCreate(array $data): Contacts
    {
        $entity = $this->first();
        if (isset($entity)) {
            return tap($entity)->update($data);
        } else {
            return Contacts::create($data);
        }
    }
}
