<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Color extends Model
{
    use HasFactory;

    protected $table = 'colors';

    protected $guarded = false;

    /**
     * @return BelongsToMany<Product, Color>
     */
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class,'color_products','color_id','product_id');
    }

    protected $fillable = [
        'title',
        'hex_code',
    ];

    protected $casts = [
        'create_at' => 'datetime',
        'update_at' => 'datetime',
    ];
}
