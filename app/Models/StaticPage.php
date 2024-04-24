<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaticPage extends Model
{
    use HasFactory, Sluggable;

    /**
     * @var string
     */
    protected $table = 'static_pages';

    /**
     * @var bool
     */
    protected $guarded = false;

    /**
     * @var string[]
     */
    protected $fillable = [
        'title',
        'content',
        'is_toggled',
    ];

    /**
     * @return array<string,mixed>
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
            ],
        ];
    }
}
