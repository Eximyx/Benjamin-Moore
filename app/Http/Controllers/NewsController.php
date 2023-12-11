<?php

namespace App\Http\Controllers;

use App\Http\Requests\news\NewsStoreRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\NewsPost;
use App\Services\News\Service;

class NewsController extends Controller
{

    public function __construct(Service $service,)
    {
        $this->service = $service;
    }

    public function index()
    {
        if (request()->ajax()) {
            $NewsPosts = NewsPost::all();
            foreach ($NewsPosts as $newsPost) {
                $newsPost['category_id'] = Category::find($newsPost['category_id'])->title;
            }
            return datatables()->of($NewsPosts)
                ->addColumn('action', 'news.news-action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('news.index');
    }

    public function store(NewsStoreRequest $request)
    {
        $data = $this->service->news_store($request->all());


        $newsPost = NewsPost::updateOrCreate(
            [
                'id' => $data['id']],
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
}
