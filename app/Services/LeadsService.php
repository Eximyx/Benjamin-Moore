<?php

namespace App\Services;

use App\Repositories\LeadsRepository;

class LeadsService extends BaseService
{
    public function __construct(LeadsRepository $leadsRepository)
    {
        parent::__construct($leadsRepository);
    }
}
