<?php

namespace App\Repositories\ModelRepositories;

use App\Models\Partners as Model;

class PartnersRepository extends BaseModelRepository
{
    public function __construct()
    {
        parent::__construct(Model::class);
    }
}
