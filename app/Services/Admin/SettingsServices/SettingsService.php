<?php

namespace App\Services\Admin\SettingsServices;

use App\DataTransferObjects\ModelDTO\SettingsDTO;
use App\Models\Settings;
use App\Repositories\SettingRepositories\SettingsRepository;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class SettingsService
{
    /**
     * @var array<string,mixed>
     */
    protected array $repositories;

    public function __construct(
        protected SettingsRepository $settingsRepository,
    )
    {
    }

    /**
     * @param SettingsDTO $dto
     * @return Settings
     */
    public function settingsSet(SettingsDTO $dto): Settings
    {
        $dto = (array)$dto;

        $this->uploadFilesForAboutUs($dto['files']);

        return $this->settingsRepository->update($dto);
    }

    /**
     * @param array<int, UploadedFile|string> $data
     * @return Void
     */
    public function uploadFilesForAboutUs(array $data): void
    {
        foreach ($data as $value) {
            if (!is_string($value)) {
                Storage::putFileAs(
                    'public/image/sections', $value,
                    $value->getClientOriginalName());
            }
        }
    }

    /**
     * @return Settings|null
     */
    public function settingsFetch(): ?Settings
    {
        return $this->settingsRepository->first();
    }
}
