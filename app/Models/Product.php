<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    use Sluggable;

    public static function getModel()
    {
        return [
            'ModelName' => 'Товары',
            'datatable_data' => [
                'title' => 'Заголовок',
                'code' => 'Код',
                'product_category_id' => 'Категория',
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
            'selectable' => ProductCategory::Class,
            'validator_data' => [
                'title' => 'string|required',
                'main_image' => 'nullable',
                'content' => 'string|required',
                'code' => 'numeric|required',
                'gloss_level' => 'string|required',
                'description' => 'string|required',
                'type' => 'string|required',
                'colors' => 'string|required',
                'base' => 'string|required',
                'v_of_dry_remain' => 'string|required',
                'time_to_repeat' => 'string|required',
                'consumption' => 'string|required',
                'thickness' => 'string|required',
                'product_category_id' => 'required',
            ]
        ];
    }
    protected $table = 'products';
    protected $guarded = false;
    public function category()
    {
        return $this->belongsTo(ProductCategory::class,'product_category_id','id');
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

