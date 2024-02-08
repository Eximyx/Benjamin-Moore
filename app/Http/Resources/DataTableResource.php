<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DataTableResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array<string>
     */
    public function toArray(Request $request): array
    {
        return [
            'selectable' => $request['selectable'],
            'datatable_columns' => $request['datatable_columns'],
            'data' => $request['data']
        ];
    }
}
