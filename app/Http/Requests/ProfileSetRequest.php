<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileSetRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id' => '',
            'email' => 'email|required',
            'password' => 'required',
            'user_role_id' => ''
        ];
    }
}
