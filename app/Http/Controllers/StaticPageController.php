<?php

namespace App\Http\Controllers;

// use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\StaticPage;
use App\Services\News\Service;

class StaticPageController extends Controller
{

    public function __construct(Service $service,)
    {
        $this->service = $service;
    }

    public function index()
    {
        if (request()->ajax()) {
            $StaticPages = StaticPage::all();
            return datatables()->of($StaticPages)
                ->rawColumns(['action'])
                ->addColumn('action', 'static-page/static-page-action')
                ->addIndexColumn()
                ->make(true);
            }
        return view('static-page.index');
    }

    public function store(Request $request)
    {
        $data = $request->all();


        $staticPages = StaticPage::updateOrCreate(
            [
                'id' => $data['id']],
            [
                'title' => $data['title'],
                'content' => $data['content'],
                'slug' => 'ursllll',
            ]
        );

        return Response()->json($staticPages);
    }

    public function edit(Request $request)
    {
        $staticPage = StaticPage::where('id', $request->id)->first();
        return Response()->json($staticPage);
    }
    public function destroy(Request $request)
    {
        $staticPage = StaticPage::where('id', $request->id)->delete();    
        return Response()->json($staticPage);
    } 
       public function toggle(Request $request)
    {
        $staticPage = StaticPage::where('id', $request->id)->first();
        if ($staticPage['is_toggled']) {
            $staticPage['is_toggled'] = 0; 
        } else {
            $staticPage['is_toggled'] = 1;
        }
        $staticPage->save();    
        return Response()->json($staticPage);
    }
}
