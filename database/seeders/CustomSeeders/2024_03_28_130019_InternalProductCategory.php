<?php

namespace App\Database\Seeders\CustomSeeders;

use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

return new class extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $titles = [
            'Грунтовка',
            'Образец цвета',
            'Серия Ceiling Paint',
            'Серия Ultra Spec® SCUFF-X™',
            'Серия Super Hide®',
            'Серия Ben®',
            'Серия Aura®',
        ];

        foreach ($titles as $item) {
            ProductCategory::factory()->create([
                'title' => $item,
                'kind_of_work_id' => 1,
            ]);
        }
    }
};
