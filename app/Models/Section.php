<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Section extends Model
{
    use HasFactory;

    protected $table = 'sections';

    protected $fillable = [
        'title',
        'section_position_id',
        'content',
    ];

    public function section_position(): BelongsTo
    {
        return $this->belongsTo(SectionPosition::class, 'section_position_id', 'section_position_id');
    }
}
