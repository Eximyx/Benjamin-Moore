<?php

namespace App\Traits;

use Illuminate\Support\Carbon;

trait DataTableTrait
{
    public function createDatatable($data = null)
    {
        return datatables()->of($data)
            ->rawColumns(['action'])
            ->editColumn('created_at', function ($value) {
                return Carbon::parse($value['created_at'])->format('Y-m-d H:i:s');
            })
            ->editColumn('updated_at', function ($value) {
                return Carbon::parse($value['updated_at'])->format('Y-m-d H:i:s');
            })
            ->addColumn('action', function ($value) {
                $request = request()->getPathInfo();
                return view('layouts/action', compact('request', 'value'));
            })
            ->addIndexColumn();
    }

    public function getDatatableColumns($data)
    {
        $columns = [];
        foreach ($data['datatable_data'] as $key => $item) {
            $columns[] = ['data' => $key, 'name' => $key];
        }
        return $columns;
    }
}
