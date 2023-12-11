<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
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
         \App\Models\User::factory()->create([
             'name' => 'admin',
             'email' => 'admin@admin',
             'password' => 'admin',
             'IsAdmin' => 1
         ]);
    }
}
