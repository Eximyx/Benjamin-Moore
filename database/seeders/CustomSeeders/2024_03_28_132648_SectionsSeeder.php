<?php

namespace App\Database\Seeders\CustomSeeders;

use App\Models\Section;
use App\Models\SectionPosition;
use Illuminate\Database\Seeder;

return new class extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $arr = [
            "Качество" => "Качество",
            "Профессиональный подход" => "Профессиональный подход",
            "Высокий уровень сервиса" => "Высокий уровень сервиса"
        ];

        $categoryId = 1;

        foreach ($arr as $key => $item) {
            Section::factory()->create([
                "title" => $key,
                "content" => $item,
                "section_position_id" => SectionPosition::query()->where("id", "=", $categoryId)->first()
            ]);
            $categoryId++;
        }
    }
};
