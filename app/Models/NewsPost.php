<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class NewsPost extends Model
{
    use HasFactory, Sluggable, SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'news_posts';

    /**
     * @var bool
     */
    protected $guarded = false;

    /**
     * @return BelongsTo<Category, NewsPost>
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
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

    /**
     * @var string[]
     */
    protected $fillable = [
        'title',
        'content',
        'is_toggled',
        'user_name',
        'main_image',
        'description',
        'category_id',
    ];
}
