<?php

namespace App\Repositories;

use App\Models\NewsPost as Model;


class NewsRepository extends CoreRepository
{
    public function __construct()
    {
        parent::__construct(Model::class);
    }

}
