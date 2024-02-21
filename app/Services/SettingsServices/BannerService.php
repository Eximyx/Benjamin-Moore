<?php

namespace App\Services\SettingsServices;

use App\DataTransferObjects\ToggleBannersDTO;
use App\Repositories\SettingRepositories\BannersRepository;
use App\Services\CoreService;

class BannerService extends CoreService
{
    public function __construct(BannersRepository $repository)
    {
        parent::__construct($repository);
    }

    /**
     * @return array<int|string,array<int|string, mixed>>|null
     */
    public function toggle(ToggleBannersDTO $dto): ?array
    {
        $dto = (array)$dto;

        $result = $this->repository->nullPosition();

        if ($result) {
            $result = $this->repository->toggle($dto['active_items']);
        }

        return $result;
    }
}
