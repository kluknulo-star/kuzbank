<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\BankBranch;
use App\Models\TypeDeposit;
use Database\Seeders\Bank\BankBranchSeeder;
use Database\Seeders\Bank\BankDepositSeeder;
use Database\Seeders\Bank\BonusRateSeeder;
use Database\Seeders\Bank\RoleSeeder;
use Database\Seeders\Bank\TypeDepositSeeder;
use Database\Seeders\Bank\User\AdminSeeder;
use Database\Seeders\Bank\User\ClientSeeder;
use Database\Seeders\Bank\User\WorkerSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            BankBranchSeeder::class,
            BonusRateSeeder::class,
            AdminSeeder::class,
            WorkerSeeder::class,
            ClientSeeder::class,
            TypeDepositSeeder::class,
            BankDepositSeeder::class,
        ]);
    }
}
