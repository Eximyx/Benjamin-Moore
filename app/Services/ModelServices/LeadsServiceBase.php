<?php

namespace App\Services\ModelServices;

use App\Repositories\ModelRepositories\LeadsRepository;

class LeadsServiceBase extends BaseModelService
{
    public function __construct(
        LeadsRepository $repository)
    {
        parent::__construct($repository);
    }
}
