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

        //  TODO IDK, what is that       ColorProduct::factory(300)->create();
        //
        //        StaticPage::factory()->createMany([
        //            ['title' => 'Статическая страница №1', 'en_title' => 'Static Page 1', 'content' => 'first'],
        //            ['title' => 'Статическая страница №2', 'en_title' => 'Static Page 2', 'content' => 'first'],
        //            ['title' => 'Статическая страница №3', 'en_title' => 'Static Page 3', 'content' => 'first'],
        //        ]);

        Artisan::call('app:update-meta-data');
    }
}
