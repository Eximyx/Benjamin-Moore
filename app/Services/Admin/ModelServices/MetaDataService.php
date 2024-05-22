<?php

namespace App\Services\Admin\ModelServices;

use App\Repositories\ModelRepositories\MetaDataRepository;
use Illuminate\Database\Eloquent\Model;

class MetaDataService extends BaseModelService
{
    /**
     * @param MetaDataRepository $repository
     */
    public function __construct(
        MetaDataRepository $repository
    )
    {
        parent::__construct($repository);
    }

    /**
     * @param string $url
     * @return Model
     */
    public function findByURL(string $url): Model
    {
        return $this->repository->findByURL($url);
    }

    /**
     * @param string $slug
     * @return Model
     */
    public function destroyWithEntity(string $slug): Model
    {
        $entity = $this->findBySlug($slug);

        return $this->repository->destroy($entity);
    }

    /**
     * @param string $slug
     * @return Model|null
     */
    public function findBySlug(string $slug): ?Model
    {
        return $this->repository->findBySlug($slug);
    }
}
