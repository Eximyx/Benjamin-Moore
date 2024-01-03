<?php

namespace App\Services;

use Illuminate\Support\Carbon;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class Service
{
    public function store($data, $hasImage, $model)
    {
        // return $data;
        if ($hasImage) {
            if (array_key_exists('main_image', $data)) {
                Storage::put('public\image', $data['main_image']);
                $data['main_image'] = $data['main_image']->hashName();
            } else {
                if ($data['id'] === null) {
                    $data['main_image'] = 'default_post.jpg';
                } else {
                    $data['main_image'] = 'old';
                }
            }
            if ($data['main_image'] === 'old') {
                if (isset($data['main_image'])) {
                    $data['main_image'] = $model::find($data['id'])['main_image'];
                }
            }
        }
        return $data;
    }

    public function delete_image($Entity)
    {
        if (!($Entity->main_image == 'default_post.jpg')) {
            Storage::delete('public/image/' . $Entity->main_image);
        }
        return $Entity;
    }

    public function toggle($data)
    {
        if ($data['is_toggled']) {
            $data['is_toggled'] = 0;
        } else {
            $data['is_toggled'] = 1;
        }
        return $data;
    }

    public function create_datatable($data)
    {
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
                return view('layouts/action', compact('request', 'value'));
            })
            ->addIndexColumn();
    }

    public function get_datatable_columns($data)
    {
        $columns = [];
        foreach ($data['datatable_data'] as $key => $item) {
            $columns[] = ['data' => $key, 'name' => $key];
        }
        return $columns;
    }

}
