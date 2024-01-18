<?php
namespace App\Services;
use Illuminate\Support\Carbon;
class DatatableService {
 
    public function createDatatable($data = null)
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

    public function getDatatableColumns($data)
    {
        $columns = [];
        foreach ($data['datatable_data'] as $key => $item) {
            $columns[] = ['data' => $key, 'name' => $key];
        }
        return $columns;
    }

}