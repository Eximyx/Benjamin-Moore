<?php /** @noinspection PhpMultipleClassDeclarationsInspection */

/** @noinspection StaticInvocationViaThisInspection */

namespace App\Repositories;


use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductRepository extends CoreRepository
{
    public function __construct()
    {
        parent::__construct(Product::class);
    }

    /**
     * @param mixed|null $kindOfWorkId
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
     * @param mixed|null $categories
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
