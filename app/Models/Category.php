<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $guarded = false;
    use HasFactory;
    public function posts() {
        return $this->hasMany(NewsPost::class,'category_id','id');
    }
}
