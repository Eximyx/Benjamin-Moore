<?php

namespace App\Http\Controllers;

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
                ->addColumn('action', 'new_s.news-action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('new_s.index');
    }

    public function store(Request $request)
    {
        $data = $this->service->news_store($request->all());

        //  TODO WE NEED TO UPDATE SLUG AFTER TITLE CHANGING

        $employee = NewsPost::updateOrCreate(
            [
                'id' => $data['id']],
            [
                'title' => $data['title'],
                'main_image' => $data['main_image'],
                'category_id' => $data['category_id'],
                'content' => $data['content'],
            ]
        );

        return Response()->json($employee);
    }

    public function edit(Request $request)
    {
        $where = array('id' => $request->id);
        $employee = NewsPost::where($where)->first();

        return Response()->json($employee);
    }

    public function categoryfetch() {
        return response()->json(Category::all());
    }
    public function destroy(Request $request)
    {
        // TODO removing images from storage

        $employee = NewsPost::where('id', $request->id)->delete();

        return Response()->json($employee);
    }
}
