<?php

namespace App\Services\Admin\ModelServices;

use App\Repositories\ModelRepositories\ProductCategoryRepository;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ProductCategoryService extends BaseModelService
{
    public function __construct(
        ProductCategoryRepository $repository
    )
    {
        parent::__construct($repository);
    }

    /**
     * @return array<string,mixed>
     */
    public function getVariablesForDataTable(): array
    {
        $variables = parent::getVariablesForDataTable();
        if (isset($variables['data']['selectableModel'])) {
            $variables['selectable'] = $variables['data']['selectableModel']->all();
        }

        return $variables;
    }

    /**
     * @param Request $request
     * @return Model
     * @throws Exception
     */
    public function destroy(Request $request): Model
    {
        $entity = $this->findById($request['id']);

        if ($entity->products()->count() === 0) {
            $this->repository->destroy($entity);
        } else {
            throw new Exception(__('errors.products.categories'), 422);
        }

        return $entity;
    }
}
