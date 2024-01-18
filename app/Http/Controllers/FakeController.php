<?php

namespace App\Http\Controllers;

use App\Repositories\CoreRepository;
use App\Services\BaseService;
use Illuminate\Http\Request;
use App\Services\Service;


abstract class FakeController extends Controller
{

    protected BaseService $service;
    protected CoreRepository $repository;
    protected Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index(Service $service)
    {

        $data = $this->repository->startConditions()->getModel();

        if (request()->ajax()) {
            $Entities = $this->service->getAllDataForDatatable();

            $table = $service->create_datatable($Entities);

            return $table->make(true);
        }

        $datatable_columns = $service->get_datatable_columns($data);

        $selectable = $data['selectableModel']->all();

        return view('layouts.datatable', compact(['selectable', 'data', 'datatable_columns']));
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
