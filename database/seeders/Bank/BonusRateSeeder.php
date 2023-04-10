<?php

namespace Database\Seeders\Bank;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\BonusRate;
use Illuminate\Database\Seeder;

class BonusRateSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        BonusRate::insert([
            [
                'title' => 'Бронза',
                'percent' => 0.3,
            ],
            [
                'title' => 'Серебро',
                'percent' => 1.2,
            ],
            [
                'title' => 'Платина',
                'percent' => 2.4,
            ],
            [
                'title' => 'Золото',
                'percent' => 4.8,
            ],
            [
                'title' => 'Бриллиант',
                'percent' => 9.6,
            ],
        ]);
    }
}
