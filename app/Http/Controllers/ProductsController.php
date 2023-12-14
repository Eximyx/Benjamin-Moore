<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
// TODO ERICHEK PRODUCT Controller, Validator, Layout, Model (function)

class ProductsController extends BaseController
{
    public function index()
    {
        $data = Product::getModel();
        $selectable = ProductCategory::All();
        $datatable_columns = [];
        foreach ($data['datatable_data'] as $key => $item){ 
            $datatable_columns[] = ['data' => $key, 'name' => $key]; 
        };
        if (request()->ajax()) {
            $Entities = Product::all();
            foreach ($Entities as $Enity) {
                $Enity['product_category_id'] = ProductCategory::find($Enity['product_category_id'])->title;
            }
            return $this->service->create_datatable($Entities)->make(true);
        }
        return view('layouts.datatable',compact('data','selectable', 'datatable_columns'));
    }

    public function store(Request $request)
    {
        $data = $this->service->image_store($request->validate([
            'id' => 'numeric|nullable',
            'title' => 'string|required',
            'main_image' => 'nullable',
            'content' => 'string|required',
            'code' => 'numeric|required',
            'gloss_level' => 'string|required',
            'description' => 'string|required',
            'type' => 'string|required',
            'colors' => 'string|required',
            'base' => 'string|required',
            'v_of_dry_remain' => 'string|required',
            'time_to_repeat' => 'string|required',
            'consumption' => 'string|required',
            'thickness' => 'string|required',
            'product_category_id' => 'numeric|required',
        ]));
        

        $Entity = Product::updateOrCreate(
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
                'product_category_id' => $data['product_category_id'],
            ]
        );

        return Response()->json($Entity);
    }

    public function edit(Request $request)
    {
        $Entity = Product::where('id', $request->id)->first();

        return Response()->json($Entity);
    }

    public function destroy(Request $request)
    {
        $Entity = Product::where('id', $request->id)->first(); 
        $this->service->delete_image($Entity);
        $Entity->delete();
        
        return Response()->json($Entity);
    }
    public function toggle(Request $request) {
        $data = Product::where('id', $request->id)->first();
        $data = $this->service->toggle($data)->save();
        return response()->json($data);
    }
}
