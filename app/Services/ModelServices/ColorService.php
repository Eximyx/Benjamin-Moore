<?php

namespace App\Services\ModelServices;

use App\Repositories\ModelRepositories\ColorRepository;

class ColorService extends BaseModelService
{
    public function __construct(ColorRepository $repository)
    {
        parent::__construct($repository);
    }
}
