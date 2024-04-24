<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'categories';

    /**
     * @var bool
     */
    protected $guarded = false;

    /**
     * @return HasMany<NewsPost>
     */
    public function posts(): HasMany
    {
        return $this->hasMany(NewsPost::class, 'category_id', 'id');
    }

    /**
     * @var string[]
     */
    protected $fillable = [
        'title',
    ];
}
