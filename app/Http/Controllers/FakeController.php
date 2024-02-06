<?php

namespace App\Http\Controllers;

use App\Services\BaseService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Resources\DataTableResource;


abstract class FakeController extends Controller
{

    public function __construct(
        protected BaseService $service,
        protected string $dto,
        protected string $resource,
        protected string $request,
    ) {
    }

    public function index()
    {
        if (request()->ajax()) {
            return $this->service->ajaxDataTable();
        }

        $data = DataTableResource::make(
            $this->service->getVariablesForDataTable()
        );
        return view(
            'layouts.datatable',
            compact('data')
        );

    }

    public function create(Request $request)
    {
        $request = new $this->request($request->all());
        $dto = $this->dto::AppRequest(
            $request
        );

        $entity = $this->service->create($dto);
        return $this->resource::make($entity);
    }
    public function update(Request $request)
    {
        $entity = $this->edit($request);

        $request = new $this->request($request->all());

        $entity = $this->service->update(
            entity: $entity,
            dto: $this->dto::appRequest($request)
        );

        return $this->resource::make($entity);
    }
    public function edit(Request $request)
    {
        $entity = $this->service->findById($request->id);
        return $this->resource::make($entity);
    }

    public function delete(Request $request)
    {
        $entity = $this->service->destroy($request);

        return $this->resource::make($entity);
    }

    public function toggle(Request $request)
    {
        $entity = $this->service->toggle($request);

        return $this->resource::make($entity);
    }
}
