<?php

namespace App\Repositories\SettingRepositories;

use App\Models\Settings;

class SettingsRepository
{
    /**
     * @param  array<string,mixed>  $data
     */
    public function update(array $data): Settings
    {
        $entity = $this->first();

        return tap($entity)->update($data);
    }

    public function first(): Settings
    {
        $entity = Settings::first();
        if ($entity === null) {
            $entity = Settings::create(['id' => 1]);
        }

        return $entity;
    }
}
