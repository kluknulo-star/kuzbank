<?php

namespace Database\Seeders\Bank\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ClientSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//        $fullNames = [];
//        for($i = 0; $i < 20; $i++)
//        {
//            $fioString = fake('ru_RU')->unique()->name();
//            $fioArray = explode(' ', $fioString);
//            $fioItem = [
//                'surname' => $fioArray[0],
//                'name' => $fioArray[1],
//                'patronymic' => $fioArray[2],
//            ];
//            $fullNames[] = $fioItem;
//        }

        User::insert([
            [
                'name' => 'Злата',
                'surname' => 'Данилова',
                'patronymic' => 'Романовна',
                'email' => 'client@kuzbank.ru',
                'passport_info' => rand(1000, 9999) . ' ' . rand(100000, 999999),
                'bonus_rate_id' => rand(1, 4),
                'password' => Hash::make('client@kuzbank.ru'),
                'role_id' => 1,
            ],
            [
                'name' => 'Абрам',
                'surname' => 'Никонов',
                'patronymic' => 'Иванович',
                'email' => 'client2@kuzbank.ru',
                'passport_info' => rand(1000, 9999) . ' ' . rand(100000, 999999),
                'bonus_rate_id' => rand(1, 4),
                'password' => Hash::make('client2@kuzbank.ru'),
                'role_id' => 1,
            ],
            [
                'name' => 'Иосиф',
                'surname' => 'Тихонов',
                'patronymic' => 'Владимирович',
                'email' => 'client3@kuzbank.ru',
                'passport_info' => rand(1000, 9999) . ' ' . rand(100000, 999999),
                'bonus_rate_id' => rand(1, 4),
                'password' => Hash::make('client3@kuzbank.ru'),
                'role_id' => 1,
            ],
            [
                'name' => 'Ульяна',
                'surname' => 'Доронина',
                'patronymic' => 'Романовна',
                'email' => 'client4@kuzbank.ru',
                'passport_info' => rand(1000, 9999) . ' ' . rand(100000, 999999),
                'bonus_rate_id' => rand(1, 4),
                'password' => Hash::make('client4@kuzbank.ru'),
                'role_id' => 1,
            ],
            [
                'name' => 'Андрей',
                'surname' => 'Крюков',
                'patronymic' => 'Сергеевич',
                'email' => 'client5@kuzbank.ru',
                'passport_info' => rand(1000, 9999) . ' ' . rand(100000, 999999),
                'bonus_rate_id' => rand(1, 4),
                'password' => Hash::make('client5@kuzbank.ru'),
                'role_id' => 1,
            ],
            [
                'name' => 'Изольда',
                'surname' => 'Ширяеваа',
                'patronymic' => 'Владимировна',
                'email' => 'client6@kuzbank.ru',
                'passport_info' => rand(1000, 9999) . ' ' . rand(100000, 999999),
                'bonus_rate_id' => rand(1, 4),
                'password' => Hash::make('client6@kuzbank.ru'),
                'role_id' => 1,
            ],
            [
                'name' => 'Антон',
                'surname' => 'Русаков',
                'patronymic' => 'Фёдорович',
                'email' => 'client7@kuzbank.ru',
                'passport_info' => rand(1000, 9999) . ' ' . rand(100000, 999999),
                'bonus_rate_id' => rand(1, 4),
                'password' => Hash::make('client7@kuzbank.ru'),
                'role_id' => 1,
            ],
            [
                'name' => 'Мирослав',
                'surname' => 'Александрович',
                'patronymic' => 'Никифоров',
                'email' => 'client7@kuzbank.ru',
                'passport_info' => rand(1000, 9999) . ' ' . rand(100000, 999999),
                'bonus_rate_id' => rand(1, 4),
                'password' => Hash::make('client7@kuzbank.ru'),
                'role_id' => 1,
            ],
            [
                'name' => 'Владлен',
                'surname' => 'Гордеев',
                'patronymic' => 'Иванович',
                'email' => 'client7@kuzbank.ru',
                'passport_info' => rand(1000, 9999) . ' ' . rand(100000, 999999),
                'bonus_rate_id' => rand(1, 4),
                'password' => Hash::make('client7@kuzbank.ru'),
                'role_id' => 1,
            ],
            [
                'name' => 'Радислав',
                'surname' => 'Цветков',
                'patronymic' => 'Фёдорович',
                'email' => 'client7@kuzbank.ru',
                'passport_info' => rand(1000, 9999) . ' ' . rand(100000, 999999),
                'bonus_rate_id' => rand(1, 4),
                'password' => Hash::make('client7@kuzbank.ru'),
                'role_id' => 1,
            ],
        ]);
    }
}
