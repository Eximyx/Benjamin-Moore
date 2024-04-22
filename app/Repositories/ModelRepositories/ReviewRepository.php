<?php

namespace App\Repositories\ModelRepositories;

use App\Models\Review as Model;
use Illuminate\Database\Eloquent\Builder;

class ReviewRepository extends BaseModelRepository
{
    public function __construct()
    {
        parent::__construct(Model::class);
    }
    
    public function getLatest(?int $amount = null): Builder
    {
        $entities = $this->model::latest();

        if ($amount) {
            $entities = $entities->take($amount);
        }

        return $entities;
    }
}
