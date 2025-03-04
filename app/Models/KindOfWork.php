<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KindOfWork extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'kind_of_work';

    /**
     * @var bool
     */
    protected $guarded = false;

    /**
     * @return HasMany<ProductCategory>
     */
    public function product_categories(): HasMany
    {
        return $this->hasMany(ProductCategory::class, 'product_category_id', 'id');
    }
}
