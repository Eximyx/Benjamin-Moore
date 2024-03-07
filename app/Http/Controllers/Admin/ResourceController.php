<?php

namespace App\Http\Controllers\Admin;

use App\Services\CoreService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

abstract class ResourceController
{
    public function __construct(
        protected CoreService $service,
        protected string      $dto,
        protected string      $resource,
        protected string      $request,
    )
    {

    }

    public function store(Request $request): JsonResource
    {
        $request = app($this->request, $request->all());

        $dto = $this->dto::AppRequest(
            $request
        );

        $entity = $this->service->create($dto);

        return $this->resource::make($entity);
    }

    public function show(Request $request): JsonResource
    {
        $entity = $this->service->findById($request['id']);

        return $this->resource::make($entity);
    }

    public function update(Request $request): JsonResource
    {
        $entity = $this->service->findById($request['id']);

        $request = app($this->request, $request->input());

        $entity = $this->service->update(
            $entity,
            $this->dto::appRequest($request)
        );

        return $this->resource::make($entity);
    }

    public function destroy(Request $request): JsonResource
    {
        $entity = $this->service->destroy($request);

        return $this->resource::make($entity);
    }
}
