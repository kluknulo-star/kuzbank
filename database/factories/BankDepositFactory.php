<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class BankDepositFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $months = [
            6,
            12,
            24,
            48,
            96
        ];

        $approved = [
            null,
            0,
            1
        ];


        return [
            'client_id' => rand(7, 16),
            'worker_id' => rand(2, 6),
            'type_deposit_id' => rand(1, 5),
            'amount' => rand(10000, 9000000),
            'is_approved' => $approved[rand(0, count($approved) - 1)],
            'closed_at' => Carbon::now()->add($months[rand(0, count($months) - 1)], 'month'),
        ];
    }

}
