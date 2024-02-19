<?php

namespace App\Services\ModelServices;

use App\Repositories\ModelRepositories\CategoryRepository;

class CategoryServiceBase extends BaseModelService
{
    public function __construct(CategoryRepository $repository)
    {
        parent::__construct($repository);
    }
}
