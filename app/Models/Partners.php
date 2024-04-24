<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partners extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'partners';

    /**
     * @var bool
     */
    protected $guarded = false;

    /**
     * @var string[]
     */
    protected $fillable = [
        'title',
        'location',
    ];
}
