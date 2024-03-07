<?php

namespace App\Services\ModelServices;

use App\Models\MetaData;
use App\Repositories\ModelRepositories\MetaDataRepository;
use Illuminate\Database\Eloquent\Model;

class MetaDataService extends BaseModelService
{
    public function __construct(
        MetaDataRepository $repository
    ) {
        parent::__construct($repository);
    }

    public function findByURL(string $url): Model
    {
        return $this->repository->findByURL($url);
    }

    public function findBySlug(string $slug): ?MetaData
    {
        return $this->repository->findBySlug($slug);
    }
}
