<?php

namespace App\Services\Admin\ModelServices;

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

    public function findByURL(string $url): Model
    {
        return $this->repository->findByURL($url);
    }

    public function destroyWithEntity(string $slug): Model
    {
        $entity = $this->findBySlug($slug);
        return $this->repository->destroy($entity);
    }

    public function findBySlug(string $slug): ?Model
    {
        return $this->repository->findBySlug($slug);
    }
}
