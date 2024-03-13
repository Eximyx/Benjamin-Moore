<?php

namespace App\Services\Site;

use App\Repositories\ModelRepositories\MetaDataRepository;
use Illuminate\Database\Eloquent\Model;

class CalculatorService
{
    public function __construct(
        protected MetaDataRepository $metaDataRepository,
    ) {
    }

    public function metaDataFindByURL(): ?Model
    {
        return $this->metaDataRepository->findByUrl(
            request()->url()
        );
    }
}
