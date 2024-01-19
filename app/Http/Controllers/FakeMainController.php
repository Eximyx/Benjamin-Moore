<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MainService;


class FakeMainController extends Controller
{
    protected $service;
    public function __construct(MainService $mainService)
    {
        $this->service = $mainService;
    }

    public function index()
    {
        $items = $this->service->showNewsAndProducts(3, 4);
        return view("user.main", ["NewsPost" => $items['news'], "Products" => $items['products']]);
    }

    public function catalog(){
        return view('user.FakeCatalog');
    }

    public function showProduct(){
        return view('user');
    }

}
