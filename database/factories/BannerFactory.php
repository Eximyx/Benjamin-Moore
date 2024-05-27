<?php

namespace Database\Factories;

use App\Models\BannerPosition;
use Illuminate\Database\Eloquent\Factories\Factory;

class BannerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->word(),
            'image' => 'default_post.jpg',
            'description' => fake()->text(),
            'banner_position_id' => BannerPosition::query()->inRandomOrder()->first() ?? BannerPosition::factory()
        ];
    }
}
