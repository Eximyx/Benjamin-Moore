<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ToggleSectionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'active_items' => 'array|min:3|max:3|required',
            'active_items.*' => 'string|int',
            'files' => 'array|max:2|nullable',
//       TODO: This doesnt work.. I dont know why..     'files.*' => 'nullable|image',
        ];
    }
}
