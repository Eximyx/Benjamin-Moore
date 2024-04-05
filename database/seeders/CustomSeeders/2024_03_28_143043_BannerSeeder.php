<?php

namespace App\Database\Seeders\CustomSeeders;

use App\Models\Banner;
use Illuminate\Database\Seeder;

return new class extends Seeder {
    /** TODO Banner_IMAGE
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i < 4; $i++) {
            Banner::factory()->create(['title' => 'Баннер_' . $i, 'banner_position_id' => $i]);
        }
    }
};
