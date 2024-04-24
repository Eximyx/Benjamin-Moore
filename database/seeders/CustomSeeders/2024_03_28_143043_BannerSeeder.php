<?php

namespace App\Database\Seeders\CustomSeeders;

use App\Models\Banner;
use App\Models\BannerPosition;
use Illuminate\Database\Seeder;

return new class extends Seeder {
    /** TODO Banner_IMAGE
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        for ($i = 1; $i < 4; $i++) {
            Banner::factory()->create([
                'title' => 'Баннер_' . $i,
                'banner_position_id' => BannerPosition::query()->where("id", "=", $i)->first()
            ]);
        }
    }
};
