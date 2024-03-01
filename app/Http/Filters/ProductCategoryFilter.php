<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class ProductCategoryFilter extends AbstractFilter
{
    public const KIND_OF_WORK_ID = 'kind_of_work_id';

    protected function getCallbacks(): array
    {
        return [
            self::KIND_OF_WORK_ID => [$this, 'kindOfWorkId'],
        ];
    }

    public function kindOfWorkId(Builder $builder, $value)
    {
        $builder->whereIn('kind_of_work_id',$value);
    }


}
