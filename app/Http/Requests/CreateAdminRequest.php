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
            'name' => 'string|required',
            'email' => 'email|required',
            'password' => 'required',
            'user_role_id' => 'string|required'
        ];
    }
}
