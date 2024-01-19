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


    public function showWrapper($slideCount){
        $products = $this->repository->getLatest();

        $wrappedProducts = $this->wrapper($products, $slideCount);
        return $wrappedProducts;
    }

    public function wrapper($items, $slideCount)
    {
        $count = count($items);
        $j = 0;
        $List = [];
        for ($i = 0; $i < $count; $i++) {
            if ($i % $slideCount == 0 & $i !== 0) {
                $j++;
                $List[$j][] = $items[$i];
            } else {
                $List[$j][] = $items[$i];
            }
        }
        return $List;
    }
}