<?php

namespace App\Services\Admin\ModelServices;

use App\Repositories\ModelRepositories\CategoryRepository;

class CategoryService extends BaseModelService
{
    public function __construct(CategoryRepository $repository)
    {
        parent::__construct($repository);
    }
}
