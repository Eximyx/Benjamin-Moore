<?php

namespace App\Http\Controllers\Admin;

use App\Services\CoreService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Routing\Controller;

abstract class ResourceController extends Controller
{
    /**
     * @param CoreService $service
     * @param string $dto
     * @param string $resource
     * @param string $request
     */
    public function __construct(
        protected CoreService $service,
        protected string      $dto,
        protected string      $resource,
        protected string      $request,
    )
    {
    }

    /**
     * @param Request $request
     * @return JsonResponse|JsonResource
     */
    public function store(Request $request): JsonResponse|JsonResource
    {
        $request = app($this->request, $request->all());

        $dto = $this->dto::AppRequest(
            $request
        );

        $entity = $this->service->create($dto);

        return $this->resource::make($entity);
    }

    /**
     * @param string $id
     * @return JsonResource
     */
    public function edit(string $id): JsonResource
    {
        $entity = $this->service->findById($id);

        return $this->resource::make($entity);
    }

    /**
     * @param string $id
     * @param Request $request
     * @return JsonResource
     */
    public function update(string $id, Request $request): JsonResource
    {
        $entity = $this->service->findById($id);

        $request = app($this->request, $request->input());

        $entity = $this->service->update(
            $entity,
            $this->dto::appRequest($request)
        );

        return $this->resource::make($entity);
    }

    /**
     * @param Request $request
     * @return JsonResource
     */
    public function destroy(Request $request): JsonResource
    {
        $entity = $this->service->destroy($request);

        return $this->resource::make($entity);
    }
}
