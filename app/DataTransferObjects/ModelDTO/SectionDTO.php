<?php

namespace App\DataTransferObjects\ModelDTO;

use App\Contracts\ModelDTO;
use App\Http\Requests\SectionRequest;

class SectionDTO implements ModelDTO
{
    public function __construct(
        public readonly string  $title,
        public readonly ?string $section_position_id,
        public readonly string  $content,
    )
    {

    }

    public static function appRequest(SectionRequest $request): SectionDTO
    {
        return new SectionDTO(
            $request['title'],
            $request['section_position_id'],
            $request['content'],
        );

    }
}
