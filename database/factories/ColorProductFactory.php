<?php

namespace Database\Factories;

use App\Models\Color;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Review>
 */
class ColorProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'color_id' => Color::query()->inRandomOrder()->first() ?? Color::factory(),
            'product_id' => Product::query()->inRandomOrder()->first() ?? Product::factory(),
        ];
    }
}
