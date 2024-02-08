<?php /** @noinspection PhpUndefinedMethodInspection */

/** @noinspection NullPointerExceptionInspection */

namespace App\Http\Controllers;

use App\Http\Resources\DataTableResource;
use App\Services\BaseService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Routing\Controller;


abstract class BaseAdminController extends Controller
{

    public function __construct(
        protected BaseService $service,
        protected string      $dto,
        protected string      $resource,
        protected string      $request,
    )
    {
    }

    /**
     * @return JsonResponse|View
     */
    public function index(): JsonResponse|View
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

    public function create(Request $request): JsonResource
    {
        $request = new $this->request($request->all());
        $dto = $this->dto::AppRequest(
            $request
        );

        $entity = $this->service->create($dto);
        return $this->resource::make($entity);
    }

    public function update(Request $request): JsonResource
    {
        $entity = $this->edit($request);

        $request = new $this->request($request->all());

        $entity = $this->service->update(
            $entity,
            $this->dto::appRequest($request)
        );

        return $this->resource::make($entity);
    }

    public function edit(Request $request): JsonResource
    {
        $entity = $this->service->findById($request['id']);
        return $this->resource::make($entity);
    }

    public function delete(Request $request): JsonResource
    {
        $entity = $this->service->destroy($request);

        return $this->resource::make($entity);
    }

    public function toggle(Request $request): JsonResource
    {
        $entity = $this->service->toggle($request);

        return $this->resource::make($entity);
    }
}