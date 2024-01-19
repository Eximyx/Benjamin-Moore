<?php

namespace App\Repositories;

use App\Models\StaticPage as Model;


class StaticPageRepository extends CoreRepository
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