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
                'email' => 'client@client.ru',
                'passport_info' => rand(1000, 9999) . ' ' . rand(100000, 999999),
                'bonus_rate_id' => rand(1, 4),
                'password' => Hash::make('client@client.ru'),
                'role_id' => 0,
            ],
            [
                'name' => 'Абрам',
                'surname' => 'Никонов',
                'patronymic' => 'Иванович',
                'email' => 'client2@client.ru',
                'passport_info' => rand(1000, 9999) . ' ' . rand(100000, 999999),
                'bonus_rate_id' => rand(1, 4),
                'password' => Hash::make('client2@client.ru'),
                'role_id' => 0,
            ],
            [
                'name' => 'Иосиф',
                'surname' => 'Тихонов',
                'patronymic' => 'Владимирович',
                'email' => 'client3@client.ru',
                'passport_info' => rand(1000, 9999) . ' ' . rand(100000, 999999),
                'bonus_rate_id' => rand(1, 4),
                'password' => Hash::make('client3@client.ru'),
                'role_id' => 0,
            ],
            [
                'name' => 'Ульяна',
                'surname' => 'Доронина',
                'patronymic' => 'Романовна',
                'email' => 'client4@client.ru',
                'passport_info' => rand(1000, 9999) . ' ' . rand(100000, 999999),
                'bonus_rate_id' => rand(1, 4),
                'password' => Hash::make('client4@client.ru'),
                'role_id' => 0,
            ],
            [
                'name' => 'Андрей',
                'surname' => 'Крюков',
                'patronymic' => 'Сергеевич',
                'email' => 'client5@client.ru',
                'passport_info' => rand(1000, 9999) . ' ' . rand(100000, 999999),
                'bonus_rate_id' => rand(1, 4),
                'password' => Hash::make('client5@client.ru'),
                'role_id' => 0,
            ],
            [
                'name' => 'Изольда',
                'surname' => 'Ширяеваа',
                'patronymic' => 'Владимировна',
                'email' => 'client6@client.ru',
                'passport_info' => rand(1000, 9999) . ' ' . rand(100000, 999999),
                'bonus_rate_id' => rand(1, 4),
                'password' => Hash::make('client6@client.ru'),
                'role_id' => 0,
            ],
            [
                'name' => 'Антон',
                'surname' => 'Русаков',
                'patronymic' => 'Фёдорович',
                'email' => 'client7@client.ru',
                'passport_info' => rand(1000, 9999) . ' ' . rand(100000, 999999),
                'bonus_rate_id' => rand(1, 4),
                'password' => Hash::make('client7@client.ru'),
                'role_id' => 0,
            ],
            [
                'name' => 'Мирослав',
                'surname' => 'Александрович',
                'patronymic' => 'Никифоров',
                'email' => 'client7@client.ru',
                'passport_info' => rand(1000, 9999) . ' ' . rand(100000, 999999),
                'bonus_rate_id' => rand(1, 4),
                'password' => Hash::make('client7@client.ru'),
                'role_id' => 0,
            ],
            [
                'name' => 'Владлен',
                'surname' => 'Гордеев',
                'patronymic' => 'Иванович',
                'email' => 'client7@client.ru',
                'passport_info' => rand(1000, 9999) . ' ' . rand(100000, 999999),
                'bonus_rate_id' => rand(1, 4),
                'password' => Hash::make('client7@client.ru'),
                'role_id' => 0,
            ],
            [
                'name' => 'Радислав',
                'surname' => 'Цветков',
                'patronymic' => 'Фёдорович',
                'email' => 'client7@client.ru',
                'passport_info' => rand(1000, 9999) . ' ' . rand(100000, 999999),
                'bonus_rate_id' => rand(1, 4),
                'password' => Hash::make('client7@client.ru'),
                'role_id' => 0,
            ],
        ]);
    }
}
