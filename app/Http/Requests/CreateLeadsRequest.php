<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateLeadsRequest extends FormRequest
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
            'contactInfo' => 'string|required',
            'message' => 'string|required',
        ];
    }
}
