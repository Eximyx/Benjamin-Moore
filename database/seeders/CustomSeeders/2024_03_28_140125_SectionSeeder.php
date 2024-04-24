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
        Section::factory()->createMany([
            ['title' => 'Качество'],
            ['title' => 'Профессиональный подход'],
            ['title' => 'Высокий уровень сервиса'],
        ]);
    }
};
