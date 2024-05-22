<?php

namespace App\DataTransferObjects\ModelDTO;

use App\Http\Requests\SettingsRequest;

class SettingsDTO
{
    /**
     * @param string $email
     * @param string $phone
     * @param string $work_time
     * @param string $location
     * @param string $instagram
     * @param array $files
     * @param string $description
     */
    public function __construct(
        public readonly string $email,
        public readonly string $phone,
        public readonly string $work_time,
        public readonly string $location,
        public readonly string $instagram,
        public readonly array  $files,
        public readonly string $description,
    )
    {
    }

    /**
     * @param SettingsRequest $request
     * @return SettingsDTO
     */
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

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'email' => $this->email,
            'phone' => $this->phone,
            'work_time' => $this->work_time,
            'location' => $this->location,
            'instagram' => $this->instagram,
            'description' => $this->description,
            'files' => $this->files,
        ];
    }
}
