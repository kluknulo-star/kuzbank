<?php

namespace Database\Seeders\Bank;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Role;
use App\Models\TypeDeposit;
use Illuminate\Database\Seeder;

class TypeDepositSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        TypeDeposit::insert([
            [
                'title' => 'быстрый',
                'percent' => 1.1,
                'duration_month' => 6,
            ], [
                'title' => 'обычный',
                'percent' => 2.3,
                'duration_month' => 12,
            ], [
                'title' => 'медленый',
                'percent' => 4.4,
                'duration_month' => 24,
            ], [
                'title' => 'Выжидательный',
                'percent' => 7.8,
                'duration_month' => 48,
            ], [
                'title' => 'Титанический',
                'percent' => 9,
                'duration_month' => 96,
            ]
        ]);
    }
}
