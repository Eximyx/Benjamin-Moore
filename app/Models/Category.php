<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $guarded = false;

    public static function getModel()
    {
        return [
            'ModelName' => 'Категории',
            'datatable_data' => [
                'title' => 'Заголовок',
            ],
            'form_data' => [
                'title' => 'Заголовок',
            ]
        ];
    }

    public function posts()
    {
        return $this->hasMany(NewsPost::class, 'category_id', 'id');
    }

    protected $fillable = [
        'title',
    ];

    protected $hidden = [];

    protected $casts = [
        'create_at' => 'datetime',
        'update_at' => 'datetime'
    ];
}
