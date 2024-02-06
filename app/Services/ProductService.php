<?php

namespace App\Services;

use App\Repositories\ProductRepository;

class ProductService extends BaseService
{
    public function __construct(
        ProductRepository $repository
    ) {
        parent::__construct($repository);
    }

    public function getAllSelectable($kind_of_work_id = null)
    {
        $selectable = $this->repository->getAllSelectables($kind_of_work_id);

        return $selectable;
    }

    public function getAllWithFilters($categories = null)
    {
        $products = $this->repository->getAllWithFilters($categories);

        return $products;
    }


}
