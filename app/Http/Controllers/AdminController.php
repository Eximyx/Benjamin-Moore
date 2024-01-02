<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends BaseController
{
    public function __construct(User $model) {
        parent::__construct($model);    
    }
}
