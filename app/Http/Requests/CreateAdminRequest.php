<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAdminRequest extends FormRequest
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
            'password' => 'required|min:8|max:30',
            'user_role_id' => 'string|required',
        ];
    }
}
