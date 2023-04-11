<?php

namespace Database\Seeders\Bank\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Морфиус',
            'surname' => 'Админов',
            'email' => 'admin@admin.ru',
            'password' => Hash::make('admin@admin.ru'),
            'role_id' => 3,
        ]);
    }
}
