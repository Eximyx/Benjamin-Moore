<?php

namespace App\Http\Controllers;

use App\Http\Filters\ProductCategoryFilter;
use App\Http\Filters\ProductFilter;
use App\Http\Requests\ProductCategoryFilterRequest;
use App\Http\Requests\ProductFilterRequest;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Routing\Controller;

class ErikController extends Controller
{
    public function index()
    {
        return view('erik');
    }

    public function erik(ProductFilterRequest $request)
    {
        $data = $request->validated();
//        dd($data);
        /*dd(array_filter($data['kind_of_work_id']));*/

        $filter = app()->make(ProductCategoryFilter::class,['queryParams' => ['kind_of_work_id' => $data['kind_of_work_id']]]);

        $products = ProductCategory::filter($filter)->get();
//dd(['queryParams' => ['kind_of_work_id' => $data['kind_of_work_id']]]);
        dd($products,$request->query());

    }

    public function erikEr(ProductCategoryFilterRequest $request)
    {
        $data = $request->validated();
//        dd($data);
        $filter = app()->make(ProductCategoryFilter::class,['queryParams' => array_filter($data)]);

        $products = ProductCategory::filter($filter)->get();

        dd($products,$request->query());

    }
}
