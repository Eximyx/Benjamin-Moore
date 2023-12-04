<?php

namespace App\Http\Controllers\news;

use App\Http\Controllers\Controller;
use App\Http\Requests\categories\CategoriesStoreRequest;
use App\Http\Requests\categories\CategoriesUpdateRequest;
use App\Models\Category;
use App\Services\Categories\CategoryService;
use Faker\Provider\Base;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public $service;
    public function __construct(CategoryService $service)
    {
        $this->service = $service;
    }
    public function index()
    {
        $categories = Category::all();
        return view('categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoriesStoreRequest $request)
    {
        $data = $request->validated();
        $this->service->store($data);
        return redirect()->route('news.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoriesUpdateRequest $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index');
    }
}
