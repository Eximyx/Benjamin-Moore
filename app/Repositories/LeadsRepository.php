<?php

namespace App\Repositories;

use App\Models\Leads as Model;

class LeadsRepository extends CoreRepository
{
    protected $model;

    public function __construct()
    {
        parent::__construct();
    }

    protected function getModelClass()
    {
        return Model::class;
    }
}
