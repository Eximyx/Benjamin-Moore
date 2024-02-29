<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MainResource extends JsonResource
{
    /**
     * @return array<string,mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'news' => $this['news'],
            'products' => $this['products'],
            'reviews' => $this['reviews'],
            'banners' => $this['banners'],
        ];
    }
}
