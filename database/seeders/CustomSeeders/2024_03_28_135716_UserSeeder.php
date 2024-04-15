<?php

namespace App\Database\Seeders\CustomSeeders;

use App\Models\User;
use App\Models\UserRoles;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

return new class extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        if (app()->isLocal()) {
            User::factory()->create([
                'name' => 'admin',
                'email' => 'admin@admin',
                'password' => Hash::make('admin'),
                'user_role_id' => UserRoles::query()->where('id', '3')->first(),
            ]);
        }
    }
};
