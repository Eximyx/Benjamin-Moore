<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LeadResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'contactInfo' => $this->contactInfo,
            'message' => $this->message,
            'id' => $this->id,
        ];
    }
}
