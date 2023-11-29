<?php

namespace App\Http\Controllers\news;

use App\Http\Controllers\Controller;
use App\Http\Requests\news\NewsStoreRequest;
use App\Http\Requests\news\NewsUpdateRequest;
use App\Models\NewsCategory;
use App\Models\NewsPost;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;

class NewsPostController extends BaseController
{
    public function index()
    {
        $newsPosts = NewsPost::all();
        return view('news.index',compact('newsPosts'));
    }

    public function create()
    {
        $categories=NewsCategory::all();
        // dd($);
        return view('news.create', compact('categories'));
    }

    public function store(NewsStoreRequest $requests){
        $data = $requests -> validated();
        $this->service->store($data);
        return redirect()->route('news.index');
    }
    
    public function show($slug)
    {
        $newsPost = NewsPost::where('slug',$slug)->first();
        return view('news.show',compact('newsPost'));
    }

    public function edit(NewsPost $newsPost)
    {
        $categories = NewsCategory::all();
        return view('news.edit',compact('newsPost','categories'));
    }

    public function update(NewsUpdateRequest $request,NewsPost $newsPost)
    {
        $data = $request->validated();
    
        $this -> service -> update($newsPost,$data);
    
        return redirect()->route('news.show', $newsPost->id);
    }

    public function destroy(NewsPost $newsPost)
    {
        $newsPost->delete();

        return redirect()->route('news.index');
    }
}

