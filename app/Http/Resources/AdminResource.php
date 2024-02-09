<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AdminResource extends JsonResource
{
    /**
     * @return array<string,mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this['name'],
            'email' => $this['email'],
            'password' => $this['password'],
            'user_role_id' => $this['user_role_id'],
            'id' => $this['id'],
        ];
    }
}
