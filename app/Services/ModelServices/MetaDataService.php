<?php

namespace App\Services\ModelServices;

use App\Repositories\ModelRepositories\MetaDataRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class MetaDataService extends BaseModelService
{
    public function __construct(
        MetaDataRepository $repository
    )
    {
        parent::__construct($repository);
    }

    public function findByURL(string $url): ?Model
    {
        $entity = $this->repository->findByURL($url);

        if ($entity == null) {
            throw new ModelNotFoundException('ds', 500);
        }

        return $entity;
    }

}
