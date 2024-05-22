<?php

namespace Database\Factories;

use App\Models\KindOfWork;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->name(),
            'kind_of_work_id' => KindOfWork::query()->inRandomOrder()->first(),
        ];
    }
}
