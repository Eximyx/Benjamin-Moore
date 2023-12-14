<?php

namespace App\Services;

use Illuminate\Support\Carbon;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class Service
{
    public function image_store($data)
    {
        if (array_key_exists('main_image', $data)) {
            Storage::put('public\image', $data['main_image']);
            $data['main_image'] = $data['main_image']->hashName();
        } else {
            $data['main_image'] = 'default_post.jpg';
        }

        return $data;
    }

    public function delete_image($newsPost)
    {
        if (!($newsPost->main_image == 'default_post.jpg')) {
            Storage::delete('public/image/' . $newsPost->main_image);
        }
        return $newsPost;
    }

    public function toggle($data) {
        if ($data['is_toggled']) {
            $data['is_toggled'] = 0; 
        } else {
            $data['is_toggled'] = 1;
        }
        return $data;
    }

    public function create_datatable($data) {
       return datatables()->of($data)
                ->rawColumns(['action'])
                ->editColumn('created_at', function () {
                    return Carbon::parse()->format('Y-m-d H:i:s');
                })
                ->editColumn('updated_at', function () {
                    return Carbon::parse()->format('Y-m-d H:i:s');
                })
                ->addColumn('action', function ($value) {
                    $request = request()->getPathInfo();
                    return view('layouts/action',compact('request','value'));
                })
                ->addIndexColumn();
    }

}
