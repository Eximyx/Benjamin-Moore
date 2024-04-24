<?php

namespace App\Http\Resources\ModelResources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MetaDataResource extends JsonResource
{
    /**
     * @param Request $request
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
