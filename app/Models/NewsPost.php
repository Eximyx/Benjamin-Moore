<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NewsPost extends Model
{
    use HasFactory;
    use Sluggable;
    use SoftDeletes;

    public static function getModel()
    {
        return [
            'ModelName' => 'Новости',
            'datatable_data' => [
                'title' => 'Заголовок',
                // 'main_image' => 'Фото',
                // 'content' => 'Содержимое',
                'category_id' => 'Категория',
            ],
            'form_data' => [
                'title' => 'Заголовок',
                'content' => 'Содержимое',
                'category_id' => 'Категория',
                'main_image' => 'Фото',
            ]
        ];
    }
    protected $table = 'news_posts';
    protected $guarded = false;
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
