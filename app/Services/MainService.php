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

    public function showNews($amountOfNews = null)
    {
        $news = $this->newsSer->showLatest($amountOfNews);
        return $news;
    }

    public function productsWrapper($amountOfProducts = 4)
    {
        $products = $this->productSer->showWrapper($amountOfProducts);
        return $products;
    }

    public function findProductBySlug($slug)
    {
        $product = $this->productSer->findBySlug($slug);
        return $product;
    }

    public function findNewsBySlug($slug)
    {
        $news = $this->newsSer->findBySlug($slug);
        return $news;
    }

    public function fetchProducts($data = null)
    {
        $list['category_title'] = null;
        $kind_of_work_id = null;
        $category_id = null;

        if ($data) {
            $kind_of_work_id = $data['kind_of_work_id'];
            $category_id = $data['category_id'];
        }

        $list['categories'] = $this->productSer->getAllSelectable($kind_of_work_id);
        if (!$category_id) {
            $category_id = $list['categories']->pluck('id')->toArray();
        } else {
            $list['category_title'] = $list['categories']->find($category_id)->title;
        }

        $list['categories'] = $list['categories']->get();
        $list['products'] = $this->productSer->getAllWithFilters($category_id);

        return $list;
    }

}
