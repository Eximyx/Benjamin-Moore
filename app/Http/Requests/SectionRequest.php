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
            'title' => 'required|string|between:5,30',
            'description' => 'nullable|required|string|between:5,160',
            'section_position_id' => 'nullable|string|exists:section_positions,id',
        ];
    }
}
