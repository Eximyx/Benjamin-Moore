<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

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
            ],
            'selectable_key' => 'kind_of_work_id',
            'selectableModel' => new KindOfWork()
        ];
    }

    public static function getWork()
    {
        return [
            0 => [
                "id" => 0,
                "title" => 'Внутренние работы'
            ],
            1 => [
                "id" => 1,
                "title" => "Наружные работы"
            ],
        ];
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'product_category_id', 'id');
    }
    public function kind_of_work()
    {
        return $this->belongsTo(KindOfWork::class, 'kind_of_work_id', 'id');
    }

    protected $fillable = [
        'title',
        'content',
        'kind_of_work_id',
    ];

    protected $hidden = [];

    protected $casts = [
        'create_at' => 'datetime',
        'update_at' => 'datetime'
    ];
}
