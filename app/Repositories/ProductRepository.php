<?php

namespace App\Repositories;

use App\Models\Product as Model;

class ProductRepository extends CoreRepository
{
    public function __construct()
    {
        parent::__construct(Model::class);
    }

    public function getAllSelectables($kindOfWorkId = null)
    {
        $selectable = clone $this->model->getModel()['selectableModel'];

        if ($kindOfWorkId) {
            $selectable = $selectable->where('kind_of_work_id', $kindOfWorkId);
        }

        return $selectable;
    }

    public function getAllWithFilters($categories = null)
    {
        $products = $this->startConditions();
        if (gettype($categories) == "array") {
            $products = $products->whereIn('product_category_id', $categories);
        } else {
            $products = $products->where('product_category_id', $categories);
        }

        return $products->orderBy('product_category_id', 'desc')->paginate(12);
    }
}
