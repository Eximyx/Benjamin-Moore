<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateColorRequest extends FormRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'id' => 'numeric|nullable',
            'title' => 'string|required|min:5|max:30',
            'hex_code' => 'string|required|max:7',
        ];
    }
}
