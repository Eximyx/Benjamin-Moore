<?php

namespace App\Http\Controllers;

use App\Models\NewsPost;
use Illuminate\Http\Request;

class NewsPostController extends Controller
{
    public function index()
    {
        $newsPost = NewsPost::all();
        return view('news.index',compact('newsPost'));
    }

    public function create()
    {
        return view('news.create');
    }

    public function store(Request $request)
    {
        $data = request()->validate([
            'title'=>'required|string',
            'content'=> 'string',
            'main_image'=>'string'
        ]);
        $post=NewsPost::create($data);
        return redirect()->route('news.index');
    }

    public function show(NewsPost $newsPost)
    {
        return view('news.show',compact('newsPost'));
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
