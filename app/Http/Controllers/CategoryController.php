<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;


class CategoryController extends BaseController
{
    public function index()
    {
        $data = Category::getModel();
        $datatable_columns = $this->service->get_datatable_columns($data);
        if (request()->ajax()) {
            $entities = Category::all();
            return $this->service->create_datatable($entities)->make(true);
        }
        return view('layouts.datatable',compact('data','datatable_columns'));
    }

    public function store(Request $request)
    {
        $data = $request->validate(['id' => 'numeric|nullable','title' => 'string|required']);
        $entity = Category::updateOrCreate(
            [
                'id' => $data['id']
            ],
            [
                'title' => $data['title'],
            ]
        );

        return Response()->json($entity);
    }

    public function edit(Request $request)
    {
        $entity = Category::where('id',$request->id)->first();
        return Response()->json($entity);
    }
    public function destroy(Request $request)
    {
        $entity = Category::where('id', $request->id)->delete(); 
        return Response()->json($entity);
    }
}
