<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use App\Services\News\Service;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function __construct(Service $service)
    {
        $this->service = $service;
    }
    public function index()
    {
        $kinds = ProductCategory::getWork();
        if (request()->ajax()) {
            $product_categories = ProductCategory::all();
            foreach ($product_categories as $product_category) {
                $product_category['kind_of_work'] = $kinds[$product_category['kind_of_work']]; 
            }
            return datatables()->of($product_categories)
                ->addColumn('action', 'product_category.action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('product_category.index',compact('kinds'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $product_category = ProductCategory::updateOrCreate(
            [
                'id' => $data['id']
            ],
            [
                'title' => $data['title'],
                'description' => $data['description'],
                'kind_of_work' => $data['kind_of_work'],
            ]
        );

        return Response()->json($product_category);
    }

    public function edit(Request $request)
    {
        $where = array('id' => $request->id);
        $product_category = ProductCategory::where($where)->first();
        return Response()->json($product_category);
    }
    public function categoryfetch() {
        return response()->json(ProductCategory::all());
    }

    public function destroy(Request $request)
    {
        $product_category = ProductCategory::where('id', $request->id)->first(); 
        $product_category->delete();
        
        return Response()->json($product_category);
    }
}
