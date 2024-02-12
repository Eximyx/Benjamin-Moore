<?php

namespace App\Repositories;

use App\Models\Settings;

class SettingRepository
{
    /**
     * @param  array<string,mixed>  $data
     */
    public function updateOrCreate(array $data): Settings
    {
        return Settings::create($data);
    }
}
