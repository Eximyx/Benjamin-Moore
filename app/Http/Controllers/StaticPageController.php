<?php

namespace App\Http\Controllers;

use App\Models\StaticPage;
use Illuminate\Http\Request;

class StaticPageController extends BaseController
{
    public function index()
    {
        $data = StaticPage::getModel();
        $datatable_columns = $this->service->get_datatable_columns($data);
        if (request()->ajax()) {
            $Entities = StaticPage::all();
            $table = $this->service->create_datatable($Entities);
            return $table->make(true);
        }
        return view('layouts.datatable', compact('data', 'datatable_columns'));
    }

    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'id' => 'nullable',
                'title' => 'string|required',
                'content' => 'string|required'
            ]);


        $Entities = StaticPage::updateOrCreate(
            [
                'id' => $data['id']],
            [
                'title' => $data['title'],
                'content' => $data['content'],
                'slug' => '',
            ]
        );

        return Response()->json($Entities);
    }

    public function edit(Request $request)
    {
        $Entity = StaticPage::where('id', $request->id)->first();
        return Response()->json($Entity);
    }
    public function destroy(Request $request)
    {
        $Entity = StaticPage::where('id', $request->id)->delete();
        return Response()->json($Entity);
    }
    public function toggle(Request $request)
    {
        $data = StaticPage::where('id', $request->id)->first();
        $data = $this->service->toggle($data)->save();
        return Response()->json($data);
    }
}
