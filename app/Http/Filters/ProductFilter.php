<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class ProductFilter extends AbstractFilter
{
    public const KIND_OF_WORK_ID = 'kind_of_work_id';

    public const PRICE = 'price';

    public const PRODUCT_CATEGORY_ID = 'product_category_id';

    public const COLOR_ID = 'color_id';

    /**
     * @return array[]
     */
    protected function getCallbacks(): array
    {
        return [
            self::PRODUCT_CATEGORY_ID => [$this, 'productCategoryId'],
            self::PRICE => [$this, 'price'],
            self::KIND_OF_WORK_ID => [$this, 'kindOfWorkId'],
            self::COLOR_ID => [$this, 'colorId'],
        ];
    }

    /**
     * @param Builder $builder
     * @param $value
     * @return void
     */
    public function productCategoryId(Builder $builder, $value): void
    {
        $builder->whereIn('product_category_id', $value);
    }

    /**
     * @param Builder $builder
     * @param $value
     * @return void
     */
    public function kindOfWorkId(Builder $builder, $value): void
    {
        $builder->whereHas('productCategory', fn($query) => $query->whereIn('kind_of_work_id', $value))->get();
    }

    /**
     * @param Builder $builder
     * @param $value
     * @return void
     */
    public function colorId(Builder $builder, $value): void
    {
        $builder->whereHas('colors', fn($query) => $query->whereIn('color_id', $value))->get();
    }

    /**
     * @param Builder $builder
     * @param $value
     * @return void
     */
    public function price(Builder $builder, $value): void
    {
        $value['from'] = $value['from'] ?? '0';

        $builder->when(
            isset($value['to']),
            fn(Builder $subQuery) => $subQuery->whereBetween('price', [$value['from'], $value['to']]),
            fn(Builder $subQuery) => $subQuery->where('price', '>=', $value['from']),
        )->get();
    }
}
