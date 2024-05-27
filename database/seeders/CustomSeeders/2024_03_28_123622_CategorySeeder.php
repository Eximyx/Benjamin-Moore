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
            'Авто',
            'Природа',
            'Политика',
            'Искусство',
            'Обучение',
            'Развлечения',
            'Катастрофы',
        ];

        foreach ($titles as $item) {
            Category::factory()->create([
                'title' => $item,
            ]);
        }
    }
};
