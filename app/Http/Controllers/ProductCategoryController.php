<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;
// TODO ERICHEK PRODUCT_CATEGORY kind_of_work +_id Controller, Validator, Layout, Model (function)


class ProductCategoryController extends BaseController
{
    public function index()
    {
        $data = ProductCategory::getModel();
        $selectable = ProductCategory::getWork();
        $datatable_columns = $this->service->get_datatable_columns($data);
        if (request()->ajax()) {
            $entities = ProductCategory::all();
            foreach ($entities as $entity) {
                $entity['kind_of_work_id'] = $selectable[$entity['kind_of_work_id']]['title']; 
            }
            return $this->service->create_datatable($entities)->make(true);
        }
        return view('layouts.datatable',compact('data','selectable','datatable_columns'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'id' => 'numeric|nullable',
            'title'=> 'string|required',
            'content'=> 'string|required',
            'kind_of_work_id'=> 'required',
        ]);
        $entity = ProductCategory::updateOrCreate(
            [
                'id' => $data['id']
            ],
            [
                'title' => $data['title'],
                'content' => $data['content'],
                'kind_of_work_id' => $data['kind_of_work_id'],
            ]
        );

        return Response()->json($entity);
    }

    public function edit(Request $request)
    {
        $entity = ProductCategory::where('id', $request->id)->first();
        return Response()->json($entity);
    }
    public function destroy(Request $request)
    {
        $entity = ProductCategory::where('id', $request->id)->first()->delete(); 
        
        return Response()->json($entity);
    }
}
