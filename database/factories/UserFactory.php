<?php

namespace Database\Factories;

use App\Models\UserRoles;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make(Str::random(10)),
            'remember_token' => Str::random(10),
            'user_role_id' => UserRoles::query()->inRandomOrder()->first(),
        ];
    }
}
