<?php

namespace Database\Factories;

use Faker\Provider\Lorem;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\District>
 */
class DistrictFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'code' => fake()->unique()->safeEmail(),
            'description' => fake()->city(),
            'province_id' => 1,
        ];
    }
}
