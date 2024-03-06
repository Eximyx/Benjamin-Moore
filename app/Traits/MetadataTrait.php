<?php

namespace App\Traits;

use App\Http\Resources\MetaDataResource;
use App\Http\Resources\SettingsResource;
use App\Repositories\ModelRepositories\MetaDataRepository;
use App\Repositories\SettingRepositories\SettingsRepository;

trait MetadataTrait
{
    public function getMetaDataByRequest(): MetaDataResource
    {
        return MetadataResource::make(
            app(MetaDataRepository::class)
                ->findByURL(
                    request()->url()
                )
        );
    }


    public function getSettings(): SettingsResource
    {
        return SettingsResource::make(
            app(SettingsRepository::class)->first()
        );
    }
}
