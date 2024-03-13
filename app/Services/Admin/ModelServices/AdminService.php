<?php

namespace App\Services\Admin\ModelServices;

use App\Repositories\ModelRepositories\AdminRepository;

class AdminService extends BaseModelService
{
    public function __construct(AdminRepository $adminRepository)
    {
        parent::__construct($adminRepository);
    }

    public function getVariablesForDataTable(): array
    {
        $variables = parent::getVariablesForDataTable();
        if (isset($variables['data']['selectableModel'])) {
            $variables['selectable'] = $variables['data']['selectableModel']->all();
        }
        return $variables;
    }
}
