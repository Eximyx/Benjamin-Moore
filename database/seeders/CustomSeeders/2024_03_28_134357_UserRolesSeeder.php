<?php

namespace App\Database\Seeders\CustomSeeders;

use App\Models\UserRoles;
use Illuminate\Database\Seeder;

return new class extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arr = [
            'user',
            'admin',
            'root',
        ];

        foreach ($arr as $item) {
            UserRoles::factory()->create([
                'title' => $item
            ]);
        }
    }
};
