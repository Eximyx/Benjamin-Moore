<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
// <<<<<<< trying-to-add-auth
//          \App\Models\User::factory(10)->create();
.
// =======
// <<<<<<< Updated upstream
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
// =======
//         \App\Models\User::factory(10)->create();
         \App\Models\NewsPost::factory(40)->create();
// >>>>>>> main
//         \App\Models\User::factory()->create([
//             'name' => 'Test User',
//             'email' => 'test@example.com',
//         ]);
// <<<<<<< trying-to-add-auth
// =======
// >>>>>>> Stashed changes
// >>>>>>> main
    }
}
