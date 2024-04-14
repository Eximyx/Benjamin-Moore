<?php

namespace App\Database\Seeders\CustomSeeders;

use App\Models\StaticPage;
use Illuminate\Database\Seeder;

return new class extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        for ($i = 0; $i < 4; $i++) {
            StaticPage::factory()->create([
                "title" => "Статическая страница №" . $i,
                "en_title" => "Static Page №" . $i,
            ]);
        }
    }
};
