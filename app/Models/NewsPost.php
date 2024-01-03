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
                'category_id' => 'Категория',
            ],
            'form_data' => [
                'title' => 'Заголовок',
                'description' => 'Описание',
                'content' => 'Содержимое',
                'category_id' => 'Категория',
                'main_image' => 'Фото',
            ],
            'selectable' => Category::Class,
            'validator_data' => [
                'title' => 'string|required',
                'description' => 'string|required',
                'category_id' => 'string|required',
                'content' => 'string|required',
                'main_image' => 'nullable'
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
