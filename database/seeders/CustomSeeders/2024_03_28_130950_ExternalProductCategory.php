<?php

namespace App\Database\Seeders\CustomSeeders;

use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

return new class extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $titles = [
            'Грунтовка',
            'Пропитка Arborcoat®',
        ];

        foreach ($titles as $item) {
            ProductCategory::factory()->create([
                'title' => $item,
                'kind_of_work_id' => 2,
            ]);
        }
    }
};
