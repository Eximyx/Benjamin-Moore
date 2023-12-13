<?php

namespace App\Http\Controllers;
use App\Http\Controllers\BaseController;

use App\Http\Requests\news\NewsRequest;
use App\Models\Category;
use App\Models\NewsPost;

class NewsController extends BaseController
{
    public function index()
    {
        if (request()->ajax()) {
            $NewsPosts = NewsPost::all();
            foreach ($NewsPosts as $newsPost) {
                $newsPost['category_id'] = Category::find($newsPost['category_id'])->title;
            }
            return $this->service->create_datatable($NewsPosts)->make(true);
        }
        return view('news.index');
    }

    public function store(NewsRequest $request)
    {
        $data = $this->service->news_store($request->all());


        $newsPost = NewsPost::updateOrCreate(
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

        return Response()->json($newsPost);
    }

    public function edit(Request $request)
    {
        $newsPost = NewsPost::where('id', $request->id)->first();
        return Response()->json($newsPost);
    }

    public function categoryfetch() {
        return response()->json(Category::all());
    }
    public function destroy(Request $request)
    {
        $newsPost = NewsPost::where('id', $request->id)->first(); 
        $this->service->delete_image($newsPost);
        $newsPost->delete();
        
        return Response()->json($newsPost);
    }

    public function toggle(Request $request) {
        $data = NewsPost::where('id', $request->id)->first();
        $data = $this->service->toggle($data)->save();
        return response()->json($data);

    }
}
