<?php

namespace App\DataTransferObjects\ModelDTO;

use App\Http\Requests\SettingsRequest;
use Illuminate\Http\UploadedFile;

class SettingsDTO
{
    /**
     * @param  array<int, UploadedFile>  $files
     */
    public function __construct(
        public readonly string $email,
        public readonly string $phone,
        public readonly string $work_time,
        public readonly string $location,
        public readonly string $instagram,
        public readonly array $files,
        public readonly string $description,
    ) {
    }

    public static function appRequest(SettingsRequest $request): SettingsDTO
    {
        $files = [
            $request['file0'],
            $request['file1'],
        ];

        return new SettingsDTO(
            $request['email'],
            $request['phone'],
            $request['work_time'],
            $request['location'],
            $request['instagram'],
            $files,
            $request['description'],
        );

    }
}
