<?php

namespace App\Database\Seeders\CustomSeeders;

use App\Models\SectionPosition;
use Illuminate\Database\Seeder;

return new class extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        for ($i = 1; $i < 4; $i++) {
            SectionPosition::factory()->create([
                'title' => 'Секция' . $i,
            ]);
        }
    }
};
