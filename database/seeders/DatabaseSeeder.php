<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        \App\Models\Settings::factory(1)->create();
        \App\Models\Category::factory(10)->create();
        \App\Models\KindOfWork::factory()->createMany([['title' => 'Внутренние работы'], ['title' => 'Внешние работы']]);
        \App\Models\ProductCategory::factory(10)->create();
        \App\Models\NewsPost::factory(500)->create();
        \App\Models\Review::factory(1)->create();
        \App\Models\Section::factory(40)->create();
        \App\Models\BannerPosition::factory()->createMany([
            ['id' => 1, 'title' => 'Главная'],
            ['id' => 2, 'title' => 'Скидка'],
            ['id' => 3, 'title' => 'Где купить']
        ]);
        \App\Models\SectionPosition::factory()->createMany([
            ['id' => 1, 'title' => 'Секция 1'],
            ['id' => 2, 'title' => 'Секция 2'],
            ['id' => 3, 'title' => 'Секция 3']
        ]);
        \App\Models\Banner::factory(40)->create();
        \App\Models\Color::factory(30)->create();
        \App\Models\Product::factory(500)->create();
        \App\Models\Color_product::factory(300)->create();
        \App\Models\UserRoles::factory()->createMany([['title' => 'User'], ['title' => 'Admin'], ['title' => 'root']]);
        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin',
            'password' => Hash::make('admin'),
            'user_role_id' => \App\Models\UserRoles::where('id', '3')->first()['id'],
        ]);
    }
}
