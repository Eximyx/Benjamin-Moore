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

    
    public function products() {
        return $this->hasMany(Product::class,'product_category_id','id');
    }
    public static function getWork() {
        return [0 => 'Внутренние работы',1=>'Наружные работы'];
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