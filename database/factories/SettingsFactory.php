<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SettingsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'email' => fake()->email(),
            'phone' => fake()->phoneNumber(),
            'work_time' => 'Работаем ПН — ПТ, 10:00 — 19:00',
            'location' => fake()->address(),
            'instagram' => fake()->domainWord(),
            'description' => fake()->text(),
        ];
    }
}
