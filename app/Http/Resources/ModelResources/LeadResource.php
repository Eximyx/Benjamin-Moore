<?php

namespace App\Http\Resources\ModelResources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LeadResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array<string,mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this['name'],
            'contact_info' => $this['contact_info'],
            'message' => $this['message'],
            'id' => $this['id'],
        ];
    }
}
