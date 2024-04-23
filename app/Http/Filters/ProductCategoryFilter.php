<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class ProductCategoryFilter extends AbstractFilter
{
    public const KIND_OF_WORK_ID = 'kind_of_work_id';

    public const PRODUCT_CATEGORY_ID = 'product_category_id';

    protected function getCallbacks(): array
    {
        return [
            self::KIND_OF_WORK_ID => [$this, 'kindOfWorkId'],
            self::PRODUCT_CATEGORY_ID => [$this, 'productCategoryId'],
        ];
    }

    public function kindOfWorkId(Builder $builder, $value)
    {
        $builder->whereIn('kind_of_work_id', $value);
    }

    public function productCategoryId(Builder $builder, $value)
    {
        $builder->whereIn('id', $value);
    }
}
