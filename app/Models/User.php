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
    
    const ROLE_USER = 0;
    const ROLE_ADMIN = 1;
    const ROLE_ROOT = 2;

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
                 'role_id' => 'Права',
             ],
             'form_data' => [
                 'name' => 'Заголовок',
                 'email' => 'Содержимое',
                 'password' => 'Категория',
                 'role_id' => 'Права',
             ]
         ];
     }


    public static function getRoles()
    {    return [
        self::ROLE_USER => "user",
        self::ROLE_ADMIN => "admin",
        self::ROLE_ROOT => "root"
        ];
    }

    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        // 'role'
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
