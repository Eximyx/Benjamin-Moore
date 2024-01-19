<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaticPage extends Model
{

    use HasFactory, Sluggable;

    protected $table = 'static_pages';
    protected $guarded = false;

    public static function getModel()
    {
        return [
            'ModelName' => 'Информация',
            'datatable_data' => [
                'title' => 'Заголовок',
                'is_toggled' => 'Отображение',
            ],
            'form_data' => [
                'title' => 'Заголовок',
                'content' => 'Содержимое',
            ]
        ];
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected $fillable = [
        'title',
        'content',
        'is_toggled',
    ];

    protected $hidden = [];

    protected $casts = [
        'create_at' => 'datetime',
        'update_at' => 'datetime'
    ];
}
