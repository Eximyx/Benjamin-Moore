<?php

namespace App\Services\Admin\ModelServices;

use App\Repositories\ModelRepositories\PartnersRepository;

class PartnersService extends BaseModelService
{
    public function __construct(PartnersRepository $repository)
    {
        parent::__construct($repository);
    }
}
