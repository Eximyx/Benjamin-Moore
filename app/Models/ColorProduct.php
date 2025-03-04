<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColorProduct extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'color_products';

    /**
     * @var bool
     */
    protected $guarded = false;
}
