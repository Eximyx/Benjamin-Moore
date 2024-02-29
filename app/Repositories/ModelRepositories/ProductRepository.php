<?php

/** @noinspection PhpMultipleClassDeclarationsInspection */

/** @noinspection StaticInvocationViaThisInspection */

namespace App\Repositories\ModelRepositories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class ProductRepository extends BaseModelRepository
{
    public function __construct()
    {
        parent::__construct(Product::class);
    }

    public function findBySlug(string $slug): ?Model
    {
        return $this->model->where('slug', '=', $slug)->firstOrFail();
    }

    /**
     * @param int $categoryID
     * @return Collection<int, Model>
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function getSimilar(int $categoryID): Collection
    {
        return $this->model->where('product_category_id', '=', $categoryID)->get();
    }

    /**
     * @return Collection<int,Model>
     */
    public function getAllSelectables(mixed $kindOfWorkId = null): Collection
    {
        $selectable = $this->modelData['selectableModel']->query();
        if ($kindOfWorkId) {
            $selectable = $selectable->where('kind_of_work_id', $kindOfWorkId);
        }

        return $selectable->get();
    }

    /**
     * @return LengthAwarePaginator<Model>
     */
    public function getAllWithFilters(mixed $categories = null): LengthAwarePaginator
    {
        $products = $this->startConditions();

        if (is_array($categories)) {
            $products = $products->whereIn('product_category_id', $categories);
        } else {
            $products = $products->where('product_category_id', $categories);
        }

        return $products->orderBy('product_category_id', 'desc')->paginate(12);
    }
}
