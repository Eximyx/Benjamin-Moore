<?php

namespace Database\Seeders;

use Eximyx\LaravelCustomSeeder\Services\CustomSeederService;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        app(CustomSeederService::class)->run();

        Artisan::call('app:update-meta-data');
    }
}
