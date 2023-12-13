<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NewsPost extends Model
{
    use HasFactory;
    use Sluggable;
    use SoftDeletes;


    protected $table = 'news_posts';
    protected $guarded = false;
    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
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