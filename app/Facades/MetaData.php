<?php

namespace App\Facades;

use App\Services\Admin\ModelServices\MetaDataService;
use Illuminate\Support\Facades\Facade;

class MetaData extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return MetaDataService::class;
    }
}
