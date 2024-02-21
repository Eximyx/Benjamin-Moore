<?php

/** @noinspection PhpUndefinedMethodInspection */

/** @noinspection NullPointerExceptionInspection */

namespace App\Http\Controllers\ModelControllers;

use App\Http\Controllers\CoreController;
use App\Http\Resources\DataTableResource;
use App\Services\CoreService;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;

abstract class BaseAdminController extends CoreController
{
    public function __construct(
        protected CoreService $service,
        protected string      $dto,
        protected string      $resource,
        protected string      $request,
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
            'layouts.datatable',
            compact('data')
        );
    }


}
