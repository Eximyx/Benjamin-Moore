<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductCategory extends Model
{
    use HasFactory, Filterable;

    protected $table = 'product_categories';

    protected $guarded = false;

    protected $fillable = [
        'title',
        'content',
        'kind_of_work_id',
    ];

    /**
     * @return HasMany<Product>
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'product_category_id', 'id');
    }

    /**
     * @return belongsTo<KindOfWork,ProductCategory>
     */
    public function kind_of_work(): BelongsTo
    {
        return $this->belongsTo(KindOfWork::class, 'kind_of_work_id', 'id');
    }
}
