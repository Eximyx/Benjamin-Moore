<?php

namespace App\Http\Controllers;

use App\Models\NewsPost;
use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view("user.main",["NewsPost"=> NewsPost::orderBy("created_at","desc")->paginate(3),"Products"=>Product::all()]);
    }

}
