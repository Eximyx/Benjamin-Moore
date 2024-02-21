<?php

namespace App\Repositories\SettingRepositories;

use App\Models\Banner;

class BannersRepository extends SettingRepository
{
    public function __construct()
    {
        parent::__construct(Banner::class);
    }
}
