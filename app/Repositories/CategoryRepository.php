<?php

namespace App\Repositories;

use App\Models\Category as Model;


class CategoryRepository extends CoreRepository
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