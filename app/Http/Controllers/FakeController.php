<?php

namespace App\Http\Controllers;

use App\Services\BaseService;
use Illuminate\Http\Request;


abstract class FakeController extends Controller
{

    protected BaseService $service;
    protected Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index()
    {

        if (request()->ajax()) {
            $table = $this->service->ajaxDataTable();
            return $table;
        }

        $datatable_variables = $this->service->getVariablesForDataTable();

        return view('layouts.datatable', [...$datatable_variables]);
    }

    public function store(Request $request)
    {
        $request = $request->validate($this->request->rules());

        $data = $this->service->store($request);
        return response()->json($data);
    }

    public function edit(Request $request)
    {
        $entity = $this->service->findById($request);
        return response()->json($entity);
    }

    public function delete(Request $request)
    {
        $entity = $this->service->destroy($request);
        return response()->json($entity);
    }

    public function toggle(Request $request)
    {
        $entity = $this->service->toggle($request);
        return response()->json($entity);
    }

}
