<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class BannerPosition extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'banner_positions';

    /**
     * @var bool
     */
    protected $guarded = false;

    /**
     * @return HasOne<Banner>
     */
    public function banners(): HasOne
    {
        return $this->hasOne(Banner::class, 'banner_id', 'id');
    }
}
