<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingsRequest extends FormRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'email' => 'email|required',
            'phone' => 'required|phone',
            'work_time' => 'required|string',
            'location' => 'required|string',
            'instagram' => 'required|string',
            'description' => 'nullable|required|string',
            'file1' => 'nullable|image|mimes:jpeg,png,jpg|dimensions:ratio=16/9',
            'file2' => 'nullable|image|mimes:jpeg,png,jpg|dimensions:ratio=16/9',
        ];
    }
}
