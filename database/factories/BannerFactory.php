<?php

namespace Database\Factories;

use App\Models\Banner;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Banner>
 */
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
            'content' => fake()->text(),
//            'banner_position_id' => BannerPosition::query()->inRandomOrder()->first() ?? BannerPosition::factory()
        ];
    }
}
