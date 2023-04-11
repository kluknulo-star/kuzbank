<?php

namespace Database\Seeders\Bank;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\BankDeposit;
use Illuminate\Database\Seeder;

class BankDepositSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        BankDeposit::factory(100)->create();
    }
}
