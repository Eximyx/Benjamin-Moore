<?php

namespace App\Services;

class MainService
{

    protected $newsSer;
    protected $productSer;

    public function __construct(NewsService $newsService, ProductService $productService)
    {
        $this->newsSer = $newsService;
        $this->productSer = $productService;
    }

    public function showNewsAndProducts($amountOfNews = null, $amountOfProducts = null)
    {
        $items['news'] = $this->newsSer->showLatest($amountOfNews);

        $items['products'] = $this->productSer->showWrapper($amountOfProducts);

        return $items;
    }

    public function fetchProducts()
    {
        $list = [];
        
        $list['categories'] = $this->productSer->getAllSelectable();

        $list['products'] = $this->productSer->showWithPaginate(12);

        return $list;
    }

}
