<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsPost extends Model
{
    use HasFactory;
    use sluggable;


    protected $table = 'news_posts';
    protected $guarded = false;
    public function category(){
        return $this->belongsTo(NewsCategory::class,'category_id','id');
    }
}
