<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Carbon;
use Illuminate\View\View;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Exceptions\Exception;

trait DataTableTrait
{
    /**
     * @throws Exception
     * @throws \Exception
     */
    public function createDatatable(?Collection $data = null): DataTableAbstract|Exception|View
    {
        return datatables()->of($data)
            ->rawColumns(['action'])
            ->editColumn('created_at', function ($value) {
                return Carbon::parse($value['created_at'])->format('Y-m-d H:i:s');
            })
            ->editColumn('updated_at', function ($value) {
                return Carbon::parse($value['updated_at'])->format('Y-m-d H:i:s');
            })
            ->editColumn('hex_code', function ($value) {
                return view('admin.components.color', compact('value'));
            })
            ->addColumn('action', function ($value) {
                $request = request()->getPathInfo();

                return view('admin.components.action', compact('request', 'value'));
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
        foreach ($data['datatable_data'] as $item) {
            $columns[] = ['data' => $item, 'name' => $item];
        }

        return $columns;
    }
}
