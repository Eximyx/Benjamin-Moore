<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductCategory extends Model
{
    use Filterable, HasFactory;

    /**
     * @var string
     */
    protected $table = 'product_categories';

    /**
     * @var bool
     */
    protected $guarded = false;

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
    public function kindOfWork(): BelongsTo
    {
        return $this->belongsTo(KindOfWork::class, 'kind_of_work_id', 'id');
    }

    /**
     * @var string[]
     */
    protected $fillable = [
        'title',
        'content',
        'kind_of_work_id',
    ];
}
