<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    public static function getModel()
    {
        return [
            'ModelName' => 'Пользователи',
            'datatable_data' => [
                'name' => 'Имя',
                'email' => 'Email',
                'user_role_id' => 'Права',
            ],
            'form_data' => [
                'name' => 'Имя',
                'email' => 'Email',
                'password' => 'Пароль',
                'user_role_id' => 'Права',
            ],
            'selectable' => UserRoles::class,
            'validator_data' => [
                'name' => 'string|required',
                'email' => 'email|required',
                'password' => 'required',
                'user_role_id' => 'string|required'
            ]
        ];
    }

    function userRoles()
    {
        return $this->belongsTo(UserRoles::class, 'user_role_id', 'id');
    }

    protected $fillable = [
        'name',
        'email',
        'password',
        'user_role_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
