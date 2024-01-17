<?php

namespace App\Repositories;

use App\Models\ProductCategory as Model;


class ProductCategoryRepository extends CoreRepository
{

    protected $model;
    protected $service;

    public function __construct()
    {
        parent::__construct();
    }
    protected function getModelClass()
    {
        return Model::class;
    }

}