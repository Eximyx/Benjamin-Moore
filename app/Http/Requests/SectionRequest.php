<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SectionRequest extends FormRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'title' => 'string',
            'section_position_id' => 'nullable|string|exists:section_positions,id|unique:section_positions,id',
            'content' => 'nullable|required|string|between:5,160',
        ];
    }
}
