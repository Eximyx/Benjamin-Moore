<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * @var string
     */
    protected $table = 'users';

    /**
     * @return BelongsTo<UserRoles, User>,
     */
    public function userRoles(): BelongsTo
    {
        return $this->belongsTo(UserRoles::class, 'user_role_id', 'id');
    }

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'user_role_id',
    ];

    /**
     * @var string[]
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
