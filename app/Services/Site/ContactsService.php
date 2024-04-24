<?php

namespace App\Services\Site;

use App\Repositories\ModelRepositories\BannersRepository;
use App\Repositories\ModelRepositories\MetaDataRepository;
use App\Repositories\ModelRepositories\PartnersRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class ContactsService
{
    public function __construct(
        protected MetaDataRepository $metaDataRepository,
        protected BannersRepository  $bannersRepository,
        protected PartnersRepository $partnersRepository,
    )
    {
    }

    /**
     * @return Collection<int, Model>
     */
    public function getPartners(): Collection
    {
        return $this->partnersRepository->getLatest()->get();
    }

    /**
     * @param int $id
     * @return Model
     */
    public function getBannerByPositionId(int $id): Model
    {
        return $this->bannersRepository->getBannerByPositionId($id);
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
