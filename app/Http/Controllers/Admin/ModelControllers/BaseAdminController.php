<?php

/** @noinspection PhpUndefinedMethodInspection */

/** @noinspection NullPointerExceptionInspection */

namespace App\Http\Controllers\Admin\ModelControllers;

use App\Http\Controllers\Admin\ResourceController;
use App\Http\Resources\DataTableResource;
use App\Services\Admin\ModelServices\BaseModelService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;

abstract class BaseAdminController extends ResourceController
{
    /**
     * @param BaseModelService $service
     * @param string $dto
     * @param string $resource
     * @param string $request
     */
    public function __construct(
        BaseModelService $service,
        string           $dto,
        string           $resource,
        string           $request,
    )
    {
        parent::__construct(
            $service, $dto, $resource, $request
        );
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
            'admin.pages.datatable',
            ['data' => $data]
        );
    }
}
