<?php

namespace App\Database\Seeders\CustomSeeders;

use App\Models\BannerPosition;
use Illuminate\Database\Seeder;

return new class extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arr = [
            'Главная',
            'Скидка',
            'Где купить',
        ];

        foreach ($arr as $item) {
            BannerPosition::factory()->create([
                'title' => $item,
            ]);
        }
    }
};
