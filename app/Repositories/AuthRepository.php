<?php

namespace App\Repositories;

use App\Models\User as Model;

class AuthRepository extends CoreRepository
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
