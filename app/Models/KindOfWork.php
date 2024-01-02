<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KindOfWork extends Model
{
    use HasFactory;

    protected $table = 'kind_of_work';
    protected $guarded = false;
    public function product_categories(){
        return $this->hasMany(ProductCategory::class,'product_category_id','id');
    }
}
