<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MetaData extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'meta_data';

    /**
     * @var string[]
     */
    protected $fillable = [
        'url',
        'title',
        'meta_description',
        'meta_keywords',
        'h',
        'additional_text',
    ];
}
