<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'id' => 'numeric|nullable',
            'name' => 'string|required|min:2|max:25',
            'email' => 'email|required|min:5|max:50',
            'password' => 'string|required|min:8|max:30|nullable',
        ];
    }
}
