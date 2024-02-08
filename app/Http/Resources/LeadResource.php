<?php

namespace App\Http\Resources;

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
        /**
         * @param Request $request
         * @return array<string,mixed>
         */
        return [
            'name' => $this['name'],
            'contactInfo' => $this['contactInfo'],
            'message' => $this['message'],
            'id' => $this['id'],
        ];
    }
}
