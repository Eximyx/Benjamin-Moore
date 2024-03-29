<?php

namespace App\Services\Admin\ModelServices;

use App\Repositories\ModelRepositories\ColorRepository;
use App\Repositories\ModelRepositories\MetaDataRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class ColorService extends BaseModelService
{
    public function __construct(
        protected MetaDataRepository $metaDataRepository,
        ColorRepository $repository,
    ) {
        parent::__construct($repository);
    }

    public function metaDataFindByURL(): ?Model
    {
        return $this->metaDataRepository->findByUrl(
            request()->url()
        );
    }

    /**
     * @return Collection<int, Model>
     */
    public function getAll(): Collection
    {
        return $this->repository->getAll();
    }
}
