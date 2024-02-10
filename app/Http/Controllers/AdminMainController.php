<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminMainController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function set(Request $request)
    {
        $counter = [];
        foreach ($request->allFiles() as $key => $val) {
            $counter[] = $val->getClientOriginalName();
        }
        return response()->json([$request, $counter]);
    }
}
