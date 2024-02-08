<?php

namespace App\Traits;

use Illuminate\Support\Carbon;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Exceptions\Exception;

trait DataTableTrait
{
    /**
     * @throws \Exception
     */
    public function createDatatable($data = null): DataTableAbstract|Exception
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

    /**
     * @param array $data
     * @return array
     */
    public function getDatatableColumns(array $data): array
    {
        $columns = [];
        foreach ($data['datatable_data'] as $key => $item) {
            $columns[] = ['data' => $key, 'name' => $key];
        }
        return $columns;
    }
}
