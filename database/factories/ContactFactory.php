<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{

    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'phone' => fake()->unique()->numberBetween(61000000, 65999999),
            'email' => rand(0, 1) ? fake()->safeEmail() : null,
            'message' => fake()->text(50),
            'received_at' => fake()->dateTimeBetween('-2 weeks', 'now'),
        ];
    }
}
