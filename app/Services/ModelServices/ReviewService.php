<?php

namespace App\Services\ModelServices;

use App\Repositories\ModelRepositories\ReviewRepository;

class ReviewService extends BaseModelService
{
    public function __construct(ReviewRepository $repository)
    {
        parent::__construct($repository);
    }
}
