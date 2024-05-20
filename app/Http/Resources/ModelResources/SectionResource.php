<?php

namespace App\Http\Resources\ModelResources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SectionResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array<string,mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this['id'],
            'title' => $this['title'],
            'section_position_id' => $this['section_position_id'],
            'content' => $this['content'],
        ];
    }
}
