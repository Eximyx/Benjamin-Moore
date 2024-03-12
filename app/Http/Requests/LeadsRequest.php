<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LeadsRequest extends FormRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'id' => 'nullable|numeric',
            'name' => 'required|string|between:2,25',
            'contact_info' => 'required|phone|email|between:5,50',
            'message' => 'required|string|max:255',
        ];
    }
}
