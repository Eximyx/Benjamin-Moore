<?php

/** @noinspection PhpMultipleClassDeclarationsInspection */

/** @noinspection StaticInvocationViaThisInspection */

namespace App\Repositories\ModelRepositories;

use App\Http\Filters\ProductCategoryFilter;
use App\Http\Filters\ProductFilter;
use App\Http\Requests\ProductFilterRequest;
use App\Models\Product;
use App\Models\ProductCategory;
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

    public function create(array $dto): ?Model
    {
        $colors = $dto['colors'];
        unset($dto['colors']);

        $product = $this->model->create($dto);

        $product->colors()->attach($colors);

        return $product;
    }

    public function update(Model $entity, array $dto): Model
    {
        $colors = $dto['colors'];
        unset($dto['colors']);

        $product = tap($entity)->update($dto);

        $product->colors()->sync($colors);

        return $product;
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

    public function fetchCategories(ProductFilterRequest $request): Collection
    {
        $data = $request->validated();

        $filter = app()->make(ProductCategoryFilter::class, ['queryParams' => ['kind_of_work_id' => $data['kind_of_work_id']]]);

        return ProductCategory::filter($filter)->get();
    }

    public function fetchProducts(ProductFilterRequest $request): Collection
    {
        $data = $request->validated();

        $filter = app()->make(ProductFilter::class, ['queryParams' => array_filter($data)]);

        return Product::filter($filter)->get()->paginate(12);
    }

    public function getAllForDatatable(): Collection
    {
        $data = $this->modelData;

        $query = $this->queryForDatatable($data);

        $entities = $this->startConditions();

        $entities = $entities->join(...$query['join']);

        return $entities->select(...$query['select'])->get();
    }

    public function queryForDatatable(array $data): array
    {
        $query = parent::queryForDatatable($data);

        $selectableModelName = $data['selectableModel']->getTable();

        $tagsModelName = $data['tagsModel']->getTable();

        $intermediateModelname = $data['intermediateModel']->getTable();

        $query['join'] = [
            $selectableModelName,
            $this->model->getTable() . '.' . $data['selectable_key'],
            '=',
            $selectableModelName . '.id',
            'left',
        ];

//        $query['tagsJoin'] = [
//            $tagsModelName,
//            $intermediateModelname . '.' . 'product_id',
//            '=',
//            $tagsModelName . 'id',
//            'left',
//        ];


        $query['select'][] = $selectableModelName . '.title as ' . $data['selectable_key'];

        return $query;
    }
}
