<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'products';
    protected $guarded = false;

    public static function getModel()
    {
        return [
            'ModelName' => 'Товары',
            'datatable_data' => [
                'title' => 'Заголовок',
                'code' => 'Код',
                'product_category_id' => 'Категория',
                'is_toggled' => 'Отображение'
            ],
            'form_data' => [
                'title' => 'Заголовок',
                'main_image' => 'Фото',
                'content' => 'Характеристика',
                'code' => 'Код',
                'gloss_level' => 'Степень блеска',
                'description' => 'Описание',
                'type' => 'Тип',
                'colors' => 'Цвета',
                'base' => 'Базы',
                'v_of_dry_remain' => 'V сухого остатка',
                'time_to_repeat' => 'Повторное нанесение',
                'consumption' => 'Расход кв.м/гал',
                'thickness' => 'Толщина сухой пленки (милы)',
                'product_category_id' => 'Серия',
            ],
            'selectable_key' => 'product_category_id',
            'selectableModel' => new ProductCategory()
        ];
    }

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id', 'id');
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
        'main_image',
        'code',
        'gloss_level',
        'description',
        'type',
        'colors',
        'base',
        'v_of_dry_remain',
        'time_to_repeat',
        'consumption',
        'thickness',
        'product_category_id'
    ];

    protected $hidden = [];

    protected $casts = [
        'create_at' => 'datetime',
        'update_at' => 'datetime'
    ];
}
