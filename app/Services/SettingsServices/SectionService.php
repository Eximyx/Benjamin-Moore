<?php

namespace App\Services\SettingsServices;

use App\DataTransferObjects\ToggleSectionsDTO;
use App\Repositories\SettingRepositories\SectionRepository;
use App\Services\CoreService;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class SectionService extends CoreService
{
    public function __construct(SectionRepository $repository)
    {
        parent::__construct($repository);
    }

    /**
     * @return array<int|string,array<int|string, mixed>>|null
     */
    public function toggle(ToggleSectionsDTO $dto): ?array
    {
        $dto = (array)$dto;

        $result = $this->repository->nullPosition();

        if ($result) {
            $this->uploadFilesForSections($dto['files']);
            $result = $this->repository->toggle($dto['active_items']);
        }

        return $result;
    }

    /**
     * @param array<int,UploadedFile|string> $data
     */
    public function uploadFilesForSections(array $data): void
    {
        foreach ($data as $value) {
            if (!is_string($value)) {
                Storage::putFileAs(
                    'public/image/sections', $value,
                    $value->getClientOriginalName());
            }
        }
    }
}
