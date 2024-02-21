<?php

namespace App\Repositories\SettingRepositories;

use App\Models\Contacts;

class ContactsRepository
{
    /**
     * @param  array<string,mixed>  $data
     */
    public function updateOrCreate(array $data): Contacts
    {
        return Contacts::create($data);
    }
}
