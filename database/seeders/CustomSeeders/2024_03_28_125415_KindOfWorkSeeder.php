<?php

namespace App\Database\Seeders\CustomSeeders;

use App\Models\KindOfWork;
use Illuminate\Database\Seeder;

return new class extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        KindOfWork::factory()->createMany([
            ['title' => 'Внутренние работы'],
            ['title' => 'Внешние работы'],
        ]);
    }
};
