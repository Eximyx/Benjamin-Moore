<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'reviews';

    /**
     * @var bool
     */
    protected $guarded = false;

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'description',
    ];
}
