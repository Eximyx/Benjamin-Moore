<?php

namespace App\Actions;

use App\Http\Resources\ModelResources\MetaDataResource;
use App\Services\Admin\ModelServices\MetaDataService;

class GetMetaDataByURLAction
{
    public function __construct(
        protected MetaDataService $metaDataService,
    )
    {
    }

    public function __invoke(): MetaDataResource
    {
        return MetadataResource::make(
            $this->metaDataService->findByURL(
                request()->url()
            )
        );
    }
}
