<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Banner extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'banners';

    /**
     * @return BelongsTo<BannerPosition>
     */
    public function banner_position(): BelongsTo
    {
        return $this->belongsTo(BannerPosition::class, 'banner_position_id', 'banner_position_id');
    }

    /**
     * @var string[]
     */
    protected $fillable = [
        'title',
        'content',
        'position',
        'banner_position_id',
        'image',
    ];
}
