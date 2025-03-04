<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserRoles extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'user_roles';

    /**
     * @return HasMany<User>
     */
    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'user_role_id', 'id');
    }
}
