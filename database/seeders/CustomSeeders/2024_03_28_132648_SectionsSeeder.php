<?php

namespace App\Database\Seeders\CustomSeeders;

use App\Models\Section;
use Illuminate\Database\Seeder;

return new class extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $arr = [
            "Качество",
            
        ];
        for ($i = 1; $i < 4; $i++) {
            Section::factory()->create([
                'title' => 'Качество' . $i,
            ]);
        }
    }
};
