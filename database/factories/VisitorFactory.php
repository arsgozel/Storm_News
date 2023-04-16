<?php

namespace Database\Factories;

use App\Models\IpAddress;
use App\Models\UserAgent;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Visitor>
 */
class VisitorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_agent_id' => UserAgent::inRandomOrder()->first()->id,
            'ip_address' => $this->faker->unique()->ipv4(),
            'requests' => rand(1, 100),
            'created_at' => fake()->dateTimeBetween('-1 year', 'now')->format('Y-m-d H:i:s'),
            'updated_at' => fake()->dateTimeBetween('-2 month', 'now')->format('Y-m-d H:i:s'),
        ];
    }
}
