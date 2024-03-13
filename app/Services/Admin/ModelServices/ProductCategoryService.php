<?php

namespace App\Services\Admin\ModelServices;

use App\Repositories\ModelRepositories\ProductCategoryRepository;

class ProductCategoryService extends BaseModelService
{
    public function __construct(
        ProductCategoryRepository $repository
    ) {
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
}
