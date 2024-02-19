<?php

namespace App\Services\ModelServices;

use App\Repositories\ModelRepositories\BaseModelRepository;
use App\Services\CoreService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Pagination\LengthAwarePaginator;
use Yajra\DataTables\Exceptions\Exception;

abstract class BaseModelService extends CoreService
{
    public function __construct(BaseModelRepository $repository)
    {
        parent::__construct($repository);
    }

    /**
     * @return LengthAwarePaginator<Model>
     */
    public function showWithPaginate(int $amount = 1): LengthAwarePaginator
    {
        return $this->repository->getModelClass()::paginate($amount);
    }

    /**
     * @throws Exception
     */
    public function ajaxDataTable(): JsonResponse
    {
        $entities = $this->repository->getAllForDatatable();

        return $this->createDatatable($entities)->make();
    }

    /**
     * @return Collection<int,Model>
     */
    public function getAllSelectable(): Collection
    {
        return $this->repository->getAllSelectables();
    }

    /**
     * @return array<string,mixed>
     */
    public function getVariablesForDataTable(): array
    {

        $modelData = $this->repository->getModelData();

        $variables = [];

        if (isset($modelData['selectableModel'])) {
            $variables['selectable'] = $modelData['selectableModel']->all();
        }
        $variables['datatable_columns'] = $this->getDatatableColumns($modelData);
        $variables['data'] = $modelData;

        return $variables;
    }
}
