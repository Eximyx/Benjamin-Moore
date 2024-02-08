<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DataTableResource extends JsonResource
{

    /**
     * @param Request $request
     * @return array<string,mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'selectable' => $this['selectable'],
            'datatable_columns' => $this['datatable_columns'],
            'data' => $this['data']
        ];
    }
}
