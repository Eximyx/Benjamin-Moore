<?php

namespace App\Database\Seeders\CustomSeeders;

use App\Models\Review;
use Illuminate\Database\Seeder;

return new class extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Review::factory(10)->create();
    }
};
