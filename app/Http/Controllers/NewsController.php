<?php

namespace App\Http\Controllers;
use App\Http\Controllers\BaseController;

use App\Models\Category;
use App\Models\NewsPost;
use Illuminate\Http\Request;

class NewsController extends BaseController
{
    public function index()
    {
        $data = NewsPost::getModel();
        $selectable = Category::All();
        
        $datatable_columns = $this->service->get_datatable_columns($data);
        
        if (request()->ajax()) {
            $Entities = NewsPost::all();
            foreach ($Entities as $Entity) {
                $Entity['category_id'] = Category::find($Entity['category_id'])->title;
            }
            $table = $this->service->create_datatable($Entities);
            return $table->make(true);
        }
        
        return view('layouts.datatable',compact('data','selectable','datatable_columns'));
    }

    public function store(Request $request)
    {

        $data = $this->service->image_store($request->validate([
            'id' => 'numeric|nullable',
            'title' => 'string|required',
            'category_id' => 'numeric|required',
            'content'=> 'string|required',
            'main_image'=> 'nullable',
    ]));
        if ($data['main_image'] === 'old') {
            $data['main_image'] = NewsPost::find($data['id'])['main_image'];
        }
        $Entity = NewsPost::updateOrCreate(
            [
                'id' => $data['id']
            ],
            [
                'title' => $data['title'],
                'main_image' => $data['main_image'],
                'category_id' => $data['category_id'],
                'content' => $data['content'],
            ]
        );

        return Response()->json($Entity);
    }

    public function edit(Request $request)
    {
        $Entity = NewsPost::where('id', $request->id)->first();
        return Response()->json($Entity);
    }
    public function destroy(Request $request)
    {
        $Entity = NewsPost::where('id', $request->id)->first(); 
        $this->service->delete_image($Entity);
        $Entity->delete();
        
        return Response()->json($Entity);
    }

    public function toggle(Request $request) {
        $data = NewsPost::where('id', $request->id)->first();
        $data = $this->service->toggle($data)->save();
        return response()->json($data);

    }
}
