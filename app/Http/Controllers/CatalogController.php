<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use App\Services\Service;

class CatalogController extends Controller
{
    public function __construct()
    {
        $this->service = new Service;
    }
    public function index(Request $request)
    {
        $categories = ProductCategory::all();

        $products = Product::orderBy("created_at", "desc")->paginate(12);
        if ($request->ajax()) {
            $categories = ProductCategory::orderBy("created_at", "desc")->get();
            $category_title = null;
            $query = Product::query();

            if (isset($request['kind_of_work_id']) && $request['kind_of_work_id'] !== '0') {
                $categories = ProductCategory::where('kind_of_work_id', $request['kind_of_work_id']);
                $query->whereIn('product_category_id', $categories->pluck('id')->toArray());
                $categories = $categories->get();
            }

            if (isset($request['category_id']) && $request['category_id'] !== "0") {
                $query->where("product_category_id", "=", $request["category_id"]);
            }
            $products = $query->orderBy("product_category_id", "asc")->paginate(12)->withQueryString();
            return response()->json([$categories, view("user.search_result", ["category" => $categories, "Products" => $products, "category_title" => $category_title])->render()]);
        }
        return view("user.catalog", ["Products" => $products, "category" => $categories]);
    }
    public function show($slug)
    {
        $Products = Product::all();
        $item = $Products->where('slug', $slug)->first();
        $Products = $this->service->wrapper($Products, 4);
        return view('user.product', compact('Products', 'item'));

    }
}
