<?php

namespace App\Services\ModelServices;

use App\Repositories\ModelRepositories\ProductRepository;

class ProductService extends BaseModelService
{
    public function __construct(ProductRepository $repository)
    {
        parent::__construct($repository);
    }
}
