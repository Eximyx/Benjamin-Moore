<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLeadsRequest;
use App\Http\Requests\ProductFilterRequest;
use App\Services\MainService;
use Illuminate\Routing\Controller;

class FakeMainController extends Controller
{

    public function __construct(
        protected MainService $mainService
    )
    {
    }

    public function index()
    {
        $items['news'] = $this->mainService->showNews(3)->get();
        $items['products'] = $this->mainService->productsWrapper();
        return view("user.main", ["NewsPost" => $items['news'], "Products" => $items['products']]);
    }

    public function news()
    {
        $newsPosts = $this->mainService->showNews()->paginate(12);
        return view('user.news', compact('newsPosts'));
    }

    public function catalog(ProductFilterRequest $request)
    {
        $entities = $this->mainService->fetchProducts();

        if (request()->ajax()) {
            $entities = $this->mainService->fetchProducts($request->validated());

            return response()->json([$entities['categories'], view("user.search_result", ["category" => $entities['categories'], "Products" => $entities['products'], "category_title" => $entities['category_title']])->render()]);
        }
        return view('user.FakeCatalog', ["entities" => $entities, "Products" => $entities['products'], "category" => $entities['categories']]);
    }

    public function newsShow($slug)
    {
        $NewsPost = $this->mainService->findNewsBySlug($slug);
        $NewsPosts = $this->mainService->showNews(3)->get();
        return view('user.news_show', compact('NewsPost', 'NewsPosts'));
    }

    public function productShow($slug)
    {
        $item = $this->mainService->findProductBySlug($slug);
        $Products = $this->mainService->productsWrapper();
        return view('user.product', compact('item', 'Products'));
    }

    public function calc()
    {
        return view('user.calculator');
    }

    public function contacts()
    {
        return view('user.contacts');
    }

    public function leads(CreateLeadsRequest $request)
    {
        $request = $request->validated();
        $leads = $this->mainService->leadsCreate($request);
        return response()->json($leads);
    }
}
