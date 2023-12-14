<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;
    use Sluggable;
    protected $table = 'product_categories';

    protected $guarded = false;

    public static function getModel()
    {
        return [
            'ModelName' => 'Категории продуктов',
            'datatable_data' => [
                'title' => 'Название',
                'kind_of_work_id' => 'Категория',
            ],
            'form_data' => [
                'title' => 'Название',
                'content' => 'Содержимое',
                'kind_of_work_id' => 'Категория',
            ]
        ];
    }


    public static function getWork()
    {
        return [
            0 => ["id" => 0,
                "title" => 'Внутренние работы'],
            1 => ["id" => 1,
                "title" => "Наружные работы"],
        ];
    }


    
    public function products() {
        return $this->hasMany(Product::class,'product_category_id','id');
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