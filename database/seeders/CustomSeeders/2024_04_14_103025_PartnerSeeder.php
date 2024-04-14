<?php

namespace App\Database\Seeders\CustomSeeders;

use App\Models\Partners;
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
            "HouseMaster" => "г. Могилев \"HouseMaster\"",
            "LuxDecor" => "г. Гродно \"LuxDecor\""
        ];

        foreach ($arr as $key => $item) {
            Partners::factory()->create([
                "title" => $key,
                "location" => $item
            ]);
        }
    }
};
