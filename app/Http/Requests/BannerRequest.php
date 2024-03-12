<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|between:5,30',
            'content' => 'required|string|nullable',
            'banner_position_id' => 'nullable|exists:banner_positions,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|dimensions:ratio=16/9',
        ];
    }
}
