<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leads extends Model
{
    use HasFactory;

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
            ],
            'validator_data' => [
                'name' => 'string|required', 
                'contactInfo' => 'string|required',
                'message' => 'string|required',
            ]
        ];
    }
    protected $table = 'leads';
    protected $guarded = false;

}
