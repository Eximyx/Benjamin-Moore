<?php

namespace App\DataTransferObjects;

use App\Contracts\ModelDTO;
use App\Http\Requests\ToggleSectionRequest;
use Illuminate\Http\UploadedFile;

class ToggleSectionsDTO implements ModelDTO
{
    /**
     * @param array<int> $active_items
     * @param array<uploadedFile> $files
     */
    public function __construct(
        public readonly array $active_items,
        public readonly array $files,
    )
    {
    }

    public static function appRequest(ToggleSectionRequest $request): ToggleSectionsDTO
    {
        return new ToggleSectionsDTO(
            $request['active_items'],
            $request['files'],
        );

    }
}
