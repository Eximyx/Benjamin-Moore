<?php

namespace App\Services;

use App\Models\Settings;
use App\Repositories\SettingRepository;

class SettingsService
{
    public function __construct(
        protected SettingRepository $repository
    )
    {

    }

    /**
     * @param array<string,mixed> $data
     * @return Settings
     */
    public function settingsSet(array $data): Settings
    {
        return $this->repository->updateOrCreate($data);
    }
}
