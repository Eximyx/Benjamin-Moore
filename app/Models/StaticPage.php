<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaticPage extends Model
{

    use HasFactory;
    use Sluggable;

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
            ],
            'validator_data' => [
                'title' =>'string|required',
                'content' => 'string|required',
            ]
        ];
    }
    protected $table = 'static_pages';
    protected $guarded = false;
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
