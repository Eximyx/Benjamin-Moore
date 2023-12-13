<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Services\Service;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        if (request()->ajax()) {
            $products = Product::all();
            foreach ($products as $product) {
                $product['product_category_id'] = ProductCategory::find($product['product_category_id'])->title;
            }
            return datatables()->of($products)
                ->addColumn('action', 'products.products-action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('products.index');
    }

    public function store(Request $request)
    {
        $data = $this->service->news_store($request->all());
        $product = Product::updateOrCreate(
            [
                'id' => $data['id']
            ],
            [
                'title' => $data['title'],
                'main_image' => $data['main_image'],
                'content' => $data['content'],
                'code' => $data['code'],
                'gloss_level' => $data['gloss_level'],
                'description' => $data['description'],
                'type' => $data['type'],
                'colors' => $data['colors'],
                'base' => $data['base'],
                'v_of_dry_remain' => $data['v_of_dry_remain'],
                'time_to_repeat' => $data['time_to_repeat'],
                'consumption' => $data['consumption'],
                'thickness' => $data['thickness'],
                'product_category_id' => $data['category_id'],
            ]
        );

        return Response()->json($product);
    }

    public function edit(Request $request)
    {
        $where = array('id' => $request->id);
        $product = Product::where($where)->first();

        return Response()->json($product);
    }

    public function categoryfetch() {
        return response()->json(ProductCategory::all());
    }

    public function destroy(Request $request)
    {
        $product = Product::where('id', $request->id)->first(); 
        $this->service->delete_image($product);
        $product->delete();
        
        return Response()->json($product);
    }
}
