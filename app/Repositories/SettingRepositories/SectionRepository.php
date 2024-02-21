<?php

namespace App\Repositories\SettingRepositories;

use App\Models\Section;

class SectionRepository extends SettingRepository
{
    public function __construct()
    {
        parent::__construct(Section::class);
    }
}
