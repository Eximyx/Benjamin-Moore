<?php

namespace App\Services\Admin\ModelServices;

use App\Repositories\ModelRepositories\BaseModelRepository;
use App\Services\CoreService;
use App\Traits\DataTableTrait;
use Illuminate\Http\JsonResponse;
use Yajra\DataTables\Exceptions\Exception;

abstract class BaseModelService extends CoreService
{
    use DataTableTrait;

    public function __construct(BaseModelRepository $repository)
    {
        parent::__construct($repository);
    }

    /**
     * @return JsonResponse
     * @throws Exception
     */
    public function ajaxDataTable(): JsonResponse
    {
        $entities = $this->repository->getAllForDatatable();

        return $this->createDatatable($entities)->make();
    }

    /**
     * @return array<string,mixed>
     */
    public function getVariablesForDataTable(): array
    {

        $modelData = $this->repository->getModelData();

        $variables = [];

        $variables['datatable_columns'] = $this->getDatatableColumns($modelData);
        $variables['data'] = $modelData;

        return $variables;
    }
}
