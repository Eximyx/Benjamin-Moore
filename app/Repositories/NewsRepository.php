<?php

namespace App\Repositories;

use App\Models\NewsPost as Model;
use App\DataTransferObjects\BaseDTO;



class NewsRepository extends CoreRepository
{
    public function __construct()
    {
        parent::__construct(Model::class);
    }


}
