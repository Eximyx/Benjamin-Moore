<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id' => 'numeric|nullable',
            'name' => 'string|required',
            'email' => 'email|required',
            'password' => 'string|required|nullable',
        ];
    }
}
