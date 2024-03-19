<?php

namespace App\Services;

use App\Contracts\ModelDTO;
use App\Repositories\CoreRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class DatabaseSeederService
{

    protected string $path_to_seeders = 'Database\Seeders\CustomSeeder';

    /**
     *
     * 
     * @return void
     */
    public function run()
    {

    }
}
