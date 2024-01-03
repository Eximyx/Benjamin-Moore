<?php

namespace Database\Factories;

use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
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
            'main_image' => '1.jpg',
            'content' => fake()->text(),
            'code' => fake()->numberBetween(0,500),
            'gloss_level' => fake()->word(),
            'description' => fake()->word(),
            'type' => fake()->word(),
            'colors' => fake()->word(),
            'base' => fake()->word(),
            'v_of_dry_remain' => fake()->word(),
            'time_to_repeat' => fake()->word(),
            'consumption' => fake()->word(),
            'thickness' => fake()->word(),
            'product_category_id' => ProductCategory::get()->random()->id,
        ];
    }
}
