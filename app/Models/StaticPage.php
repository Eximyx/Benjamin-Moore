<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaticPage extends Model
{

    public static function getModel()
    {
        return [
            'ModelName' => 'Информация',
            'datatable_data' => [
                'title' => 'Заголовок',
            ],
            'form_data' => [
                'title' => 'Заголовок',
                'content' => 'Содержимое',
            ]
        ];
    }

    protected $table = 'static_pages';
    protected $guarded = false;

    use HasFactory;
    use Sluggable;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
