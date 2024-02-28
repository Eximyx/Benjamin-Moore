<?php

namespace App\Repositories\ModelRepositories;

use App\Models\MetaData as Model;

class MetaDataRepository extends BaseModelRepository
{
    public function __construct()
    {
        parent::__construct(Model::class);
    }

    public function findByURL(string $url): ?Model
    {
        return $this->model::where('url', '=', $url)->firstOrFail();
    }
}
