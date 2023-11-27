<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaticPage extends Model
{

    protected $table = 'static_pages';
    protected $guarded = false;

    use HasFactory;
}
