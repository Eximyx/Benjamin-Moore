<?php

namespace App\Http\Controllers\news;

use App\Http\Controllers\Controller;
use App\Http\Requests\news\NewsStoreRequest;
use App\Http\Requests\news\NewsUpdateRequest;
use App\Models\Category;
use App\Models\NewsPost;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use function MongoDB\BSON\toJSON;

class NewsPostController extends BaseController
{
    public function index()
    {
        $newsPosts = NewsPost::paginate(16);
        return view('news.index', compact('newsPosts'));
    }

    public function fetchall()
    {
        return response()->json([NewsPost::all(), Category::all()]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('news.create', compact('categories'));
    }

    public function store(NewsStoreRequest $request)
    {
//        $data = $request;
//        return response()->json($request);
        $request = $request->validated();
        $this->service->store($request);
        $newspost = NewsPost::orderBy('id', 'DESC')->first();
        $newspost['category_id'] = Category::find($newspost['category_id'])->title;
        return response()->json($newspost);
    }

    public function show($slug)
    {
        $newsPost = NewsPost::where('slug', $slug)->first();
        if ($newsPost != null) {
            return view('news.show', compact('newsPost'));
        }
        abort(404);
    }

    public function edit($slug)
    {
        $categories = Category::all();
        $newsPost = NewsPost::where('slug', $slug)->first();
        return view('news.edit', compact('newsPost', 'categories'));
    }

    public function update(NewsUpdateRequest $request, NewsPost $newsPost)
    {
        $data = $request->validated();
        $this->service->update($newsPost, $data);
        return redirect()->route('news.show', $newsPost->slug);
    }

    public function destroy(NewsPost $newsPost)
    {
        $this->service->delete_image($newsPost);
        $newsPost->delete();

        return response()->json();
    }
}

