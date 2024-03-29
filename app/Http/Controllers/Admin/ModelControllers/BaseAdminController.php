<?php

/** @noinspection PhpUndefinedMethodInspection */

/** @noinspection NullPointerExceptionInspection */

namespace App\Http\Controllers\Admin\ModelControllers;

use App\Http\Controllers\Admin\ResourceController;
use App\Http\Resources\DataTableResource;
use App\Services\Admin\ModelServices\BaseModelService;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;

abstract class BaseAdminController extends ResourceController
{
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
     * @throws Exception
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
