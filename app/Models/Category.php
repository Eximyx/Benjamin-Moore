<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $guarded = false;

    /**
     * @return HasMany<NewsPost>
     */
    public function posts(): HasMany
    {
        return $this->hasMany(NewsPost::class, 'category_id', 'id');
    }

    protected $fillable = [
        'title',
    ];

    protected $casts = [
        'create_at' => 'datetime',
        'update_at' => 'datetime',
    ];
}
