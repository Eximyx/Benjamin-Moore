<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MainService;


class FakeMainController extends Controller
{
    protected $service;
    public function __construct(MainService $mainService)
    {
        $this->service = $mainService;
    }

    public function index()
    {
        $items = $this->service->showNewsAndProducts(3, 4);
        return view("user.main", ["NewsPost" => $items['news'], "Products" => $items['products']]);
    }

    public function catalog()
    {
        $entities = $this->service->fetchProducts();
        if (request()->ajax()) {
            $entities = $this->service->fetchProducts();

            return response()->json([$entities['categories'], view("user.search_result", ["category" => $entities['categories'], "Products" => $entities['products'], "category_title" =>'as'])->render()]);

            // dd($entities);
            // return response()->json($entities);

        }

        // return response()->json($entities);
        return view('user.FakeCatalog',["Products" => $entities['products'], "category" => $entities['categories']]);
    }

    public function showProduct()
    {
        return view('user');
    }

}
