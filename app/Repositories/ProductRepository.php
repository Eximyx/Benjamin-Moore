<?php 

namespace App\Repositories;

use App\Models\Product as Model;



class ProductRepository extends CoreRepository{
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