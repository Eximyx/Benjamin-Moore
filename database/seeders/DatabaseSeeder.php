<?php

namespace Database\Seeders;

use App\Models\Banner;
use App\Models\BannerPosition;
use App\Models\Category;
use App\Models\Color;
use App\Models\Color_product;
use App\Models\ColorProduct;
use App\Models\KindOfWork;
use App\Models\NewsPost;
use App\Models\Partners;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Review;
use App\Models\Section;
use App\Models\SectionPosition;
use App\Models\Settings;
use App\Models\StaticPage;
use App\Models\User;
use App\Models\UserRoles;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Settings::factory(1)->create();
        Category::factory(10)->create();
        KindOfWork::factory()->createMany([['title' => 'Внутренние работы'], ['title' => 'Внешние работы']]);
        ProductCategory::factory(10)->create();
        NewsPost::factory(500)->create();
        Review::factory(1)->create();
        BannerPosition::factory()->createMany([
            ['id' => 1, 'title' => 'Главная'],
            ['id' => 2, 'title' => 'Скидка'],
            ['id' => 3, 'title' => 'Где купить'],
        ]);
        SectionPosition::factory()->createMany([
            ['id' => 1, 'title' => 'Секция 1'],
            ['id' => 2, 'title' => 'Секция 2'],
            ['id' => 3, 'title' => 'Секция 3'],
        ]);
        Section::factory()->createMany([
            ['section_position_id' => 1],
            ['section_position_id' => 2],
            ['section_position_id' => 3],
        ]);
        Banner::factory()->createMany([
            ['banner_position_id' => 1],
            ['banner_position_id' => 2],
            ['banner_position_id' => 3],
        ]);
        Section::factory(40)->create();
        Banner::factory(40)->create();
        Color::factory(30)->create();
        Partners::factory(3)->create();
        Product::factory(500)->create();
        ColorProduct::factory(300)->create();
        UserRoles::factory()->createMany([['title' => 'User'], ['title' => 'Admin'], ['title' => 'root']]);
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin',
            'password' => Hash::make('admin'),
            'user_role_id' => UserRoles::where('id', '3')->first()['id'],
        ]);
        StaticPage::factory()->createMany([
            ['title' => 'Статическая страница №1', 'en_title' => 'Static Page 1', 'content' => 'first'],
            ['title' => 'Статическая страница №2', 'en_title' => 'Static Page 2', 'content' => 'first'],
            ['title' => 'Статическая страница №3', 'en_title' => 'Static Page 3', 'content' => 'first'],
        ]);
    }
}
