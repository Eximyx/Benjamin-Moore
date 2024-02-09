<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        \App\Models\Category::factory(10)->create();
        \App\Models\KindOfWork::factory()->createMany([['title' => 'Внутренние работы'], ['title' => 'Внешние работы']]);
        \App\Models\ProductCategory::factory(10)->create();
        \App\Models\NewsPost::factory(40)->create();
        \App\Models\Product::factory(500)->create();
        \App\Models\UserRoles::factory()->createMany([['title' => 'User'], ['title' => 'Admin'], ['title' => 'root']]);
        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin',
            'password' => Hash::make('admin'),
            'user_role_id' => \App\Models\UserRoles::where('id', '3')->first()->id,
        ]);
    }
}
