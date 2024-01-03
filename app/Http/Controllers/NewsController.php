<?php

namespace App\Http\Controllers;

use App\Models\NewsPost;

class NewsController extends BaseController
{
    public function __construct(NewsPost $model) {
        parent::__construct($model);    
    }


    public function news_index() {
        $newsposts = NewsPost::orderBy("created_at","desc")->paginate(9);
        return view("user.news",compact('newsposts'));
    }

    public function show($slug) {
        $NewsPost = NewsPost::whereSlug($slug)->firstOrFail();
        $NewsPosts = NewsPost::orderBy("created_at","desc")->paginate(4);
        return view("user.news_show", compact(["NewsPosts","NewsPost"]));
    } 
}
