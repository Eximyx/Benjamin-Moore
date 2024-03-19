<?php

namespace App\Models;

use App\Traits\Filterable;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use Filterable, HasFactory, Sluggable;

    protected $table = 'products';

    protected $guarded = false;

    protected $fillable = [
        'title',
        'content',
        'is_toggled',
        'main_image',
        'code',
        'price',
        'gloss_level',
        'description',
        'type',
        'colors',
        'base',
        'v_of_dry_remain',
        'time_to_repeat',
        'consumption',
        'thickness',
        'product_category_id',
    ];

    /**
     * @return BelongsTo<ProductCategory, Product>
     */
    public function productCategory(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id', 'id');
    }

    /**
     * @return BelongsToMany<Color, Product>
     */
    public function colors(): BelongsToMany
    {
        return $this->belongsToMany(Color::class, 'color_products', 'product_id', 'color_id');
    }

    /**
     * @return array<string,mixed>
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
            ],
        ];
    }
}
