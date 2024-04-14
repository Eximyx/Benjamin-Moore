<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
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
            'main_image' => 'краска.webp',
            'content' => fake()->text(),
            'sub_content' => fake()->text(),
            'code' => fake()->numberBetween(0, 500),
            'price' => fake()->numberBetween(0, 5000),
            'gloss_level' => fake()->word(),
            'description' => fake()->word(),
            'type' => fake()->word(),
            'base' => fake()->word(),
            'v_of_dry_remain' => fake()->word(),
            'time_to_repeat' => fake()->word(),
            'consumption' => fake()->word(),
            'thickness' => fake()->word(),
            'product_category_id' => ProductCategory::query()->inRandomOrder()->first() ?? ProductCategory::factory(),
        ];
    }
}
