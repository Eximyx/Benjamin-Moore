<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateLeadsRequest extends FormRequest
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
            'contactInfo' => 'string|required|min:5|max:50',
            'message' => 'string|required|max:200',
        ];
    }
}
