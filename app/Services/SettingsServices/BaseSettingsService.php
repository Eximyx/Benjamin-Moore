<?php

namespace App\Services\SettingsServices;

use App\Contracts\ModelDTO;
use App\Repositories\SettingRepositories\SettingRepository;
use App\Services\CoreService;
use Illuminate\Database\Eloquent\Model;

abstract class BaseSettingsService extends CoreService
{
    public function __construct(
        SettingRepository $repository
    ) {
        parent::__construct($repository);
    }

    /**
     * @return array<int,Model|null>|null
     */
    public function toggle(ModelDTO $dto): ?array
    {
        $dto = (array) $dto;

        $result = $this->repository->nullPosition();

        if ($result) {
            $result = $this->repository->toggle($dto['active_items']);
        }

        return $result;
    }
}
