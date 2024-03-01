<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetaData extends Model
{
    use HasFactory;

    protected $table = 'meta_data';

    protected $fillable = [
        'url',
        'title',
        'meta_description',
        'meta_keywords',
        'h',
        'additional_text',
    ];
}
