<?php

namespace App\Services;

use App\Repositories\ProductRepository;

class ProductService extends BaseService
{
    protected $repository;
    public function __construct(ProductRepository $productRepository)
    {
        parent::__construct();
        $this->repository = $productRepository;
    }
}