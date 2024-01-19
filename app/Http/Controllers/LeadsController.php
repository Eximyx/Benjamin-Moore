<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLeadsRequest;
use App\Services\LeadsService;

class LeadsController extends FakeController
{
    public function __construct(LeadsService $service)
    {
        parent::__construct(new CreateLeadsRequest());
        $this->service = $service;
    }
}