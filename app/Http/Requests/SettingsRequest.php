<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class SettingsRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<string, mixed>|string>
     */
    public function rules(): array
    {
        // TODO: Normal request
        return [
            'email' => 'string',
            'phone' => 'string',
            'work_time' => 'string',
            'location' => 'string',
            'instagram' => 'string',
            'description' => 'string',
            'file1' => 'image',
            'file2' => 'image',
        ];
    }
}
