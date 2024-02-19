<?php

namespace App\Services\ModelServices;

use App\Repositories\ModelRepositories\ReviewRepository;

class ReviewServiceBase extends BaseModelService
{
    public function __construct(
        ReviewRepository $repository)
    {
        parent::__construct($repository);
    }
}
