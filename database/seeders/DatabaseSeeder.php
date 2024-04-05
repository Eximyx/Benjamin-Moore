<?php

namespace Database\Seeders;

use App\Models\Color;
use Eximyx\LaravelCustomSeeder\Services\CustomSeederService;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        app(CustomSeederService::class)->run();


        //        Section::factory(40)->create();
        //        Banner::factory(40)->create();
        Color::factory(30)->create();
        //        Partners::factory(3)->create();

        //        Product::factory(500)->create();
        //
        //        ColorProduct::factory(300)->create();
        //
        //        UserRoles::factory()->createMany([['title' => 'User'], ['title' => 'Admin'], ['title' => 'root']]);
        //        User::factory()->create([
        //            'name' => 'admin',
        //            'email' => 'admin@admin',
        //            'password' => Hash::make('admin'),
        //            'user_role_id' => UserRoles::where('id', '3')->first()['id'],
        //        ]);

        //        StaticPage::factory()->createMany([
        //            ['title' => 'Статическая страница №1', 'en_title' => 'Static Page 1', 'content' => 'first'],
        //            ['title' => 'Статическая страница №2', 'en_title' => 'Static Page 2', 'content' => 'first'],
        //            ['title' => 'Статическая страница №3', 'en_title' => 'Static Page 3', 'content' => 'first'],
        //        ]);

        Artisan::call('app:update-meta-data');
    }
}
