<?php

namespace Database\Factories;

use App\Models\KindOfWork;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<KindOfWork>
 */
class KindOfWorkFactory extends Factory
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
        ];
    }
}
