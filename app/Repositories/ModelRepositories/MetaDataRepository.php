<?php

namespace App\Repositories\ModelRepositories;

use App\Models\MetaData;
use Illuminate\Database\Eloquent\Model;

class MetaDataRepository extends BaseModelRepository
{
    public function __construct()
    {
        parent::__construct(MetaData::class);
    }

    /**
     * @param string $url
     * @return Model|null
     */
    public function findByURL(string $url): ?Model
    {
        return $this->model::where('url', '=', $url)->first();
    }

    /**
     * @param string $slug
     * @return Model|null
     */
    public function findBySlug(string $slug): ?Model
    {
        return $this->model::where('url', 'like', '%' . $slug)->first();
    }
}
