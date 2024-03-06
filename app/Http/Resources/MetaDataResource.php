<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MetaDataResource extends JsonResource
{
    /**
     * @return array<string,mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this['id'],
            'url' => $this['url'],
            'title' => $this['title'],
            'meta_description' => $this['meta_description'],
            'meta_keywords' => $this['meta_keywords'],
            'h' => $this['h'],
            'additional_text' => $this['additional_text'],
        ];
    }
}
