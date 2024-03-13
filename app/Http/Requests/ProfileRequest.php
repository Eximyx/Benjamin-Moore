<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class ProfileRequest extends FormRequest
{
    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'id' => 'nullable|numeric',
            'name' => 'required|string|between:5,25',
            'email' => 'required|email|between:5,50',
            'password' => ['nullable', Password::defaults()],
        ];
    }
}
