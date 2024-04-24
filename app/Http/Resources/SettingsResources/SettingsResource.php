<?php

namespace App\Http\Resources\SettingsResources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SettingsResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array<string,mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this['id'],
            'email' => $this['email'],
            'phone' => $this['phone'],
            'work_time' => $this['work_time'],
            'location' => $this['location'],
            'instagram' => $this['instagram'],
            'description' => $this['description'],
        ];
    }
}
