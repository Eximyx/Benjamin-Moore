<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PartnersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->title(),
            'location' => fake()->address(),
        ];
    }
}
