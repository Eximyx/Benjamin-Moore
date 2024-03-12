<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ColorRequest extends FormRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'id' => 'nullable|numeric',
            'title' => 'required|string|between:5,30',
            'hex_code' => 'required|hex_color',
        ];
    }
}
