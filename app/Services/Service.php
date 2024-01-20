<?php

namespace App\Services;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

//TODO THIS MUST BE A SINGLETONE (этот сервис должен создаваться один раз, потому что в последствии все контроллеры и модели обращаются к нему)

class Service
{
    public function store($data, $hasImage, $model)
    {
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

    public function create_datatable($data = null)
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

    public function wrapper($items, $product_slide)
    {
        $count = count($items);
        $j = 0;
        $List = [];
        for ($i = 0; $i < $count; $i++) {
            if ($i % $product_slide == 0 & $i !== 0) {
                $j++;
                $List[$j][] = $items[$i];
            } else {
                $List[$j][] = $items[$i];
            }
        }
        return $List;
    }

    public function getDataKeyForCombobox($data)
    {
        foreach ($data["form_data"] as $key => $value) {
            if (strPos($key, "_id")) {
                $selectable_key = $key;
                unset($data["form_data"][$key]);
                return $selectable_key;
            }
        }
    }
}
