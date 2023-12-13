<?php

namespace App\Http\Controllers;
use App\Models\StaticPage;
use Illuminate\Http\Request;
// TODO REQUEST StaticPage EXIMYX

class StaticPageController extends BaseController
{
    public function index()
    {
        if (request()->ajax()) {
            $StaticPages = StaticPage::all();
            return $this->service->create_datatable($StaticPages)->make(true);
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
                'slug' => '',
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
        $data = StaticPage::where('id', $request->id)->first();
        $this->service->toggle($data);
        $data->save();    
        return Response()->json($data);
    }
}
