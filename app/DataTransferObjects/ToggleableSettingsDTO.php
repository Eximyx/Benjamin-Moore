<?php

namespace App\DataTransferObjects;

use App\Contracts\BaseDTO;
use App\Http\Requests\ToggleableRequest;
use Illuminate\Http\UploadedFile;

class ToggleableSettingsDTO implements BaseDTO
{
    /**
     * @param array<int> $active_items
     * @param array<uploadedFile> $files
     */
    public function __construct(
        public readonly string $tab_id,
        public readonly array  $active_items,
        public readonly array  $files,
    )
    {
    }

    public static function appRequest(ToggleableRequest $request): ToggleableSettingsDTO
    {
        return new ToggleableSettingsDTO(
            $request['tab_id'],
            $request['active_items'],
            $request['files'],
        );

    }
}
