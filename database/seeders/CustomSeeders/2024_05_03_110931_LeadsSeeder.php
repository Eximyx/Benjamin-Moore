<?php

namespace App\Database\Seeders\CustomSeeders;

use App\Models\Leads;
use Illuminate\Database\Seeder;

return new class extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Leads::factory(10)->create();
    }
};
