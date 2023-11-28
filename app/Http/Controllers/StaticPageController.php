<?php

namespace App\Http\Controllers;

use App\Models\StaticPage;
use Illuminate\Http\Request;

class StaticPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $staticPages = StaticPage::all();
//        dd($staticPages);
        return view('info.index',compact('staticPages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('info.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//        $request['hello'] = 'asdasd';
//        $request.array_push('sada'=>'sdasd') ;
//
//        dd($request);
    $request->validate([
      'title' => 'required|max:255',
      'content'=> ''
//      'body' => 'required',
    ]);
    StaticPage::create($request->all());
    return redirect()->route('info.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $staticPage = StaticPage::where('title',$id)->first();

        return view('info.show',compact('staticPage'));

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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
