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

    protected $table = 'news_posts';

    protected $guarded = false;
    protected $fillable = [
        'title',
        'content',
        'is_toggled',
        'main_image',
        'description',
        'category_id',
    ];
    protected $casts = [
        'create_at' => 'datetime',
        'update_at' => 'datetime',
    ];
    protected array $entities = [
        StaticPage::class => '/',
        Product::class => '/catalog/',
        NewsPost::class => '/news/'
    ];

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

    public function createMetaData(): void
    {
        MetaData::create([
            'url' => route('user.main.index') . $this->entities[$this::class] . $this->slug,
            'title' => $this->title,
        ]);
    }

}
