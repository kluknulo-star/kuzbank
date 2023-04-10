<?php

namespace Database\Seeders\Bank;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\BankBranch;
use Illuminate\Database\Seeder;

class BankBranchSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        BankBranch::factory(10)->create();
    }
}
