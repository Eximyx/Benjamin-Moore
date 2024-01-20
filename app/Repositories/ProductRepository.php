<?php

namespace App\Repositories;

use App\Models\Product as Model;

class ProductRepository extends CoreRepository
{
    public function __construct()
    {
        parent::__construct();
    }

    protected function getModelClass()
    {
        return Model::class;
    }

    public function getAllSelectables($kind_of_work_id = null)
    {
        $selectable = clone $this->model->getModel()['selectableModel'];

        if ($kind_of_work_id) {
            $selectable = $selectable->where('kind_of_work_id', $kind_of_work_id);
        }

        return $selectable;
    }

    public function getProductsWithFilters($categories = null)
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
