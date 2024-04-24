<?php

namespace App\Database\Seeders\CustomSeeders;

use App\Models\Category;
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
            'Образец цвета',
            'Серия Ceiling Paint',
            'Серия Ultra Spec® SCUFF-X™',
            'Серия Super Hide®',
            'Серия Ben®',
            'Серия Aura®',
        ];

        foreach ($titles as $item) {
            Category::factory()->create([
                'title' => $item,
            ]);
        }
    }
};
