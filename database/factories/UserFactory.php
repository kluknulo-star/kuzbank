<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'Епифан',
            'surname' => 'Королев',
            'patronymic' => 'Попович',
            'email' => fake()->unique()->email(),
            'password' => Hash::make('client@client.ru'),
            'role_id' => rand(0,2),
        ];
    }

}
