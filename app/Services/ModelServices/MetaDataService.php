<?php

namespace App\Services\ModelServices;

use App\Repositories\ModelRepositories\MetaDataRepository;
use Illuminate\Database\Eloquent\Model;

class MetaDataService extends BaseModelService
{
    public function __construct(
        MetaDataRepository $repository
    )
    {
        parent::__construct($repository);
    }

    public function findBySlug(string $slug): ?Model
    {
        return $this->repository->findBySlug($slug);
    }

    public function updateURL(Model $entity, string $url): Model
    {
        return $this->repository->update(
            $entity,
            ['url' => $url]
        );
    }

    public function findByURL(string $url): ?Model
    {
        return $this->repository->findByURL($url);
    }
}
