<?php

namespace Database\Seeders\Bank;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::insert([
            [
                'title' => 'client',
            ], [
                'title' => 'worker'
            ], [
                'title' => 'admin'
            ]
        ]);
    }
}
