<?php

namespace App\Services;

use App\DataTransferObjects\AboutUsDTO;
use App\DataTransferObjects\ModelDTO\SettingsDTO;
use App\Models\Settings;
use App\Repositories\SettingRepositories\ContactsRepository;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ContactsService
{
    /**
     * @var array<string,mixed>
     */
    protected array $repositories;

    public function __construct(
        protected ContactsRepository $contactsRepository,
    )
    {
    }

    public function settingsSet(SettingsDTO $dto): Settings
    {
        $dto = (array)$dto;

        $this->uploadFilesForAboutUs($dto['files']);

        return $this->contactsRepository->updateOrCreate($dto);
    }

    public function settingsFetch(): ?Settings
    {
        return $this->contactsRepository->first();
    }

    /**
     * @param array<int, UploadedFile|string> $data
     */
    public function uploadFilesForAboutUs(array $data): void
    {
        foreach ($data as $value) {
            if ($value) {
                Storage::putFileAs(
                    'public/image/sections', $value,
                    $value->getClientOriginalName());
            }
        }
    }
}
