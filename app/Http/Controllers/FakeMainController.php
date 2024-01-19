<?php

namespace App\Http\Controllers;

use App\Http\Requests\SlugRequest;
use Illuminate\Http\Request;
use App\Services\MainService;
use App\Http\Requests\ProductFilterRequest;


class FakeMainController extends Controller
{
    protected $service;
    public function __construct(MainService $mainService)
    {
        $this->service = $mainService;
    }

    public function index()
    {
        $items['news'] = $this->service->showNews(3)->get();
        $items['products'] = $this->service->productsWrapper();
        return view("user.main", ["NewsPost" => $items['news'], "Products" => $items['products']]);
    }
    public function news()
    {
        $newsposts = $this->service->showNews()->paginate(12);
        return view('user.news', compact('newsposts'));
    }
    public function catalog(ProductFilterRequest $request)
    {
        $entities = $this->service->fetchProducts();

        if (request()->ajax()) {
            $entities = $this->service->fetchProducts($request->validated());

            return response()->json([$entities['categories'], view("user.search_result", ["category" => $entities['categories'], "Products" => $entities['products'], "category_title" => $entities['category_title']])->render()]);
        }
        return view('user.FakeCatalog', ["entities" => $entities, "Products" => $entities['products'], "category" => $entities['categories']]);
    }

    public function newsShow($slug)
    {
        $NewsPost = $this->service->findNewsBySlug($slug);
        $NewsPosts = $this->service->showNews(3)->get();
        return view('user.news_show', compact('NewsPost', 'NewsPosts'));
    }
    public function productShow($slug)
    {
        $item = $this->service->findProductBySlug($slug);
        $Products = $this->service->productsWrapper();
        return view('user.product', compact('item', 'Products'));
    }

    public function calc(){
        return view('user.calculator');
    }

    public function contacts(){
        return view('user.contacts');
    }

}
