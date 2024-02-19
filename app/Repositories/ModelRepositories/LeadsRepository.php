<?php

namespace App\Repositories\ModelRepositories;

use App\Models\Leads as Model;

class LeadsRepository extends BaseModelRepository
{
    public function __construct()
    {
        parent::__construct(Model::class);
    }
}
