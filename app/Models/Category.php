<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public static function getModel()
    {
        return [
            'ModelName' => 'Категории',
            'datatable_data' => [
                'title' => 'Заголовок',
            ],
            'form_data' => [
                'title' => 'Заголовок',
            ],
            'validator_data' => [
                'title' => 'string|required'
            ]
        ];
    }

    protected $table = 'categories';

    protected $guarded = false;

    use HasFactory;
    public function posts()
    {
        return $this->hasMany(NewsPost::class, 'category_id', 'id');
    }
}
