<?php

namespace App\Database\Seeders\CustomSeeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

return new class extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Product::factory(50)->create();
    }
};
