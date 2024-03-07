<?php

namespace App\Http\Filters;

use App\Models\Color_product;
use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Builder;

class ProductFilter extends AbstractFilter
{
    public const KIND_OF_WORK_ID = 'kind_of_work_id';

    public const PRICE = 'price';

    public const PRODUCT_CATEGORY_ID = 'product_category_id';

    public const COLORS = 'colors';

    protected function getCallbacks(): array
    {
        return [
            self::PRODUCT_CATEGORY_ID => [$this, 'productCategoryId'],
            self::PRICE => [$this, 'price'],
            self::KIND_OF_WORK_ID => [$this, 'kindOfWorkId'],
            self::COLORS => [$this, 'colors'],
        ];
    }

    public function productCategoryId(Builder $builder, $value): void
    {
        $builder->whereIn('product_category_id', $value);
    }

    public function kindOfWorkId(Builder $builder, $value): void
    {
        $productCategories = ProductCategory::whereIn('kind_of_work_id', $value)->get();

        $builder->whereBelongsTo($productCategories)->get();
    }

    public function colors(Builder $builder, $value): void
    {
        $productIds = Color_product::whereIn('color_id', $value)->pluck('product_id')->all();

        $builder->WhereIn('id', $productIds)->get();

    }

    public function price(Builder $builder, $value): void
    {
        $value['from'] = $value['from'] ?? '0';

        if (isset($value['to'])) {
            $builder->whereBetween('price', [$value['from'], $value['to']])->get();
        } else {
            $builder->where('price', '>=', $value['from'])->get();
        }

    }
}
