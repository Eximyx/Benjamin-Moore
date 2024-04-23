<?php

/** @noinspection PhpMultipleClassDeclarationsInspection */

/** @noinspection StaticInvocationViaThisInspection */

namespace App\Repositories\ModelRepositories;

use App\Http\Filters\ProductCategoryFilter;
use App\Http\Filters\ProductFilter;
use App\Http\Requests\ProductFilterRequest;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class ProductRepository extends BaseModelRepository
{
    public function __construct()
    {
        parent::__construct(Product::class);
    }

    public function findBySlug(string $slug): Model
    {
        return $this->model->where('slug', '=', $slug)->firstOrFail();
    }

    /**
     * @return Collection<int, Model>
     *
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function getSimilar(int $categoryID): Collection
    {
        return $this->model->where('product_category_id', '=', $categoryID)->get();
    }

    /**
     * @return Collection<int, ProductCategory>
     *
     * @throws BindingResolutionException
     */
    public function fetchCategories(ProductFilterRequest $request): Collection
    {
        $data = $request->validated();
        
        $filter = app()->make(ProductCategoryFilter::class, ['queryParams' => array_filter($data)]);

        return ProductCategory::filter($filter)->get();
    }

    /**
     * @throws BindingResolutionException
     */
    public function fetchProducts(ProductFilterRequest $request): mixed
    {
        $data = $request->validated();

        $filter = app()->make(ProductFilter::class, ['queryParams' => array_filter($data)]);

        return Product::filter($filter);
    }

    public function getAllForDatatable(): Collection
    {
        $data = $this->modelData;

        $query = $this->queryForDatatable($data);

        $entities = $this->startConditions();

        $entities = $entities->query()->join(...$query['join']);

        return $entities->select(...$query['select'])->get();
    }

    public function queryForDatatable(array $data): array
    {
        $query = parent::queryForDatatable($data);

        $selectableModelName = $data['selectableModel']->getTable();

        $query['join'] = [
            $selectableModelName,
            $this->model->getTable() . '.' . $data['selectable_key'],
            '=',
            $selectableModelName . '.id',
            'left',
        ];

        $query['select'][] = $selectableModelName . '.title as ' . $data['selectable_key'];

        return $query;
    }

    public function getLatest(?int $amount = null): Builder
    {
        $entities = $this->model::latest();

        if ($amount) {
            $entities = $entities->take($amount);
        }

        return $entities;
    }
}
