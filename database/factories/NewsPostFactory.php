<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\NewsPost;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<NewsPost>
 */
class NewsPostFactory extends Factory
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
            'main_image' => 'default_post.jpg',
            'content' => fake()->text(),
            'description' => fake()->text(),
            'category_id' => Category::query()->inRandomOrder()->first() ?? Category::factory(),
        ];
    }
}
