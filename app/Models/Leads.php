<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leads extends Model
{
    use HasFactory;

    protected $table = 'leads';
    protected $guarded = false;

    public static function getModel()
    {
        return [
            'ModelName' => 'Обратная связь',
            'datatable_data' => [
                'name' => 'Имя',
                'contactInfo' => 'контактная информация',
                'message' => 'Сообщение',
            ],
            'form_data' => [
                'name' => 'Имя',
                'contactInfo' => 'контактная информация',
                'message' => 'Сообщение',
            ]
        ];
    }

    protected $fillable = [
        'name',
        'contactInfo',
        'message'
    ];

    protected $hidden = [];

    protected $casts = [
        'create_at' => 'datetime',
        'update_at' => 'datetime'
    ];
}
