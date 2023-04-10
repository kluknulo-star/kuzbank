<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class BankBranchFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'city' => fake('ru_RU')->city(),
            'street' => explode(' ',trim(fake('ru_RU')->streetName()))[0],
            'house' => rand(1, 190),
        ];
    }
}
