<?php

namespace Database\Seeders\Bank\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class WorkerSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::insert([
            [
                'name' => 'Регина',
                'surname' => 'Ситникова',
                'email' => 'worker@kuzbank.ru',
                'bank_branch_id' => rand(1, 10),
                'password' => Hash::make('worker@kuzbank.ru'),
                'role_id' => 2,
            ],
            [
                'name' => 'Игорь',
                'surname' => 'Богданов',
                'email' => 'worker2@kuzbank.ru',
                'bank_branch_id' => rand(1, 10),
                'password' => Hash::make('worker2@kuzbank.ru'),
                'role_id' => 2,
            ],
            [
                'name' => 'Анфиса',
                'surname' => 'Кондратьева',
                'email' => 'worker3@kuzbank.ru',
                'bank_branch_id' => rand(1, 10),
                'password' => Hash::make('worker3@kuzbank.ru'),
                'role_id' => 2,
            ],
            [
                'name' => 'Август',
                'surname' => 'Носов',
                'email' => 'worker4@kuzbank.ru',
                'bank_branch_id' => rand(1, 10),
                'password' => Hash::make('worker4@kuzbank.ru'),
                'role_id' => 2,
            ],
            [
                'name' => 'Доминика',
                'surname' => 'Алексеева',
                'email' => 'worker5@kuzbank.ru',
                'bank_branch_id' => rand(1, 10),
                'password' => Hash::make('worker5@kuzbank.ru'),
                'role_id' => 2,
            ]
        ]);
    }
}
