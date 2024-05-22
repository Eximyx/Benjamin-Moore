<?php

namespace App\Services\Admin\ModelServices;

use App\Repositories\ModelRepositories\LeadsRepository;

class LeadsService extends BaseModelService
{
    /**
     * @param LeadsRepository $repository
     */
    public function __construct(LeadsRepository $repository)
    {
        parent::__construct($repository);
    }
}
