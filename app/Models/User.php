<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

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
            'selectable_key' => 'user_role_id',
            'selectableModel' => new UserRoles()
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

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
