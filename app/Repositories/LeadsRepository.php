<?php

namespace App\Repositories;

use App\Models\Leads as Model;

class LeadsRepository extends CoreRepository
{
    public function __construct()
    {
        parent::__construct(Model::class);
    }
}
