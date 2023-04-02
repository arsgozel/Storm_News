<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Jenssegers\Agent\Agent;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserAgent>
 */
class UserAgentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $requestUserAgent = $this->faker->unique()->userAgent();
        $agent = new Agent();
        $agent->setUserAgent($requestUserAgent);
        $browser = $agent->browser();
        $platform = $agent->platform();

        return [
            'browser_login' => $agent->browser(),
            'browser_version' => $agent->version($browser),
            'device_login' => $agent->platform(),
            'device_version' => $agent->version($platform),
        ];
    }
}
