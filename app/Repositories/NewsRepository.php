<?php

namespace App\Repositories;

use App\Models\NewsPost as Model;


class NewsRepository extends CoreRepository
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