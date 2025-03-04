<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class SectionPosition extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'section_positions';

    /**
     * @var bool
     */
    protected $guarded = false;

    /**
     * @return HasOne<Banner>
     */
    public function sections(): HasOne
    {
        return $this->hasOne(Section::class, 'section_id', 'id');
    }
}
