<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class AdminRequest extends FormRequest
{
    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'id' => 'nullable|numeric',
            'name' => 'required|string|between:2,25',
            'email' => 'required|email|between:5,50',
            'password' => ['required', Password::defaults()],
            'user_role_id' => 'exists:user_roles,id',
        ];
    }
}
