<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       \App\Models\Category::factory()->create(['title' => 'first']);
        \App\Models\NewsPost::factory(40)->create();
        \App\Models\UserRoles::factory()->createMany([['title' =>'User'],['title' =>'Admin'],['title'=>'root']]);
        \App\Models\KindOfWork::factory()->createMany([['title' =>'Внутренние работы'],['title' =>'Внешние работы']]);
         \App\Models\User::factory()->create([
             'name' => 'admin',
             'email' => 'admin@admin',
             'password' => Hash::make('admin'),
             'user_role_id' => \App\Models\UserRoles::where('id', '3')->first()->id,
         ]);
    }
}
