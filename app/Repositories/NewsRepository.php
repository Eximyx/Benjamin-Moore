<?php

namespace App\Repositories;

use App\Models\NewsPost;

class NewsRepository extends CoreRepository
{
    public function __construct()
    {
        parent::__construct(NewsPost::class);
    }
}
