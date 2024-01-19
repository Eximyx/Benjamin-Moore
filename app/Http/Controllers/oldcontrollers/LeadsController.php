<?php

namespace App\Http\Controllers;

use App\Models\Leads;
use App\Models\LeadsMigration;
use Illuminate\Http\Request;

class LeadsController extends BaseController
{
    public function __construct(Leads $model) {
        parent::__construct($model);    
    }
}
