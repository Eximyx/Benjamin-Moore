<?php

namespace App\Services\Site;

use App\Repositories\ModelRepositories\MetaDataRepository;
use Illuminate\Database\Eloquent\Model;

class CalculatorService
{
    /**
     * @param MetaDataRepository $metaDataRepository
     */
    public function __construct(
        protected MetaDataRepository $metaDataRepository,
    )
    {
    }

    /**
     * @return Model|null
     */
    public function metaDataFindByURL(): ?Model
    {
        return $this->metaDataRepository->findByUrl(
            request()->url()
        );
    }
}
