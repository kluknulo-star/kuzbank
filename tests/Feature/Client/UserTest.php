<?php

namespace Tests\Feature\Client;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->withHeaders([
            'accept' => 'application/json'
        ]);
    }

    /** @test */
    public function test_register_user_with_valid_data(): void
    {
//        $this->withoutExceptionHandling();
        $registerData = [
            'email' => 'fast.klkv@mail.ru',
            'name' => 'Кирилл',
            'surname' => 'Киляков',
            'patronymic' => 'Александровчи',
            'passport_info' => '4212 234565',
            'password' => '12345678',
            'password_confirmation' => '12345678',
        ];


        $response = $this->post('register', $registerData);

        // испраивить редирект ненужный
//        dd($response);
//        $response->assertRedirect();

        $user = User::first();

        $this->assertDatabaseCount('users', 1);
        $this->assertEquals($registerData['email'], $user->email);
        $this->assertEquals($registerData['name'], $user->name);
        $this->assertEquals($registerData['surname'], $user->surname);
        $this->assertEquals($registerData['patronymic'], $user->patronymic);
        $this->assertEquals(Hash::check($registerData['password'],$user->password), true);
    }


    /** @test */
    public function test_register_user_with_invalid_data()
    {
        $registerData = [
            'password' => '12345678',
            'password_confirmation' => '123456',
        ];

        $response = $this->post('register', $registerData);

        $response->assertStatus(422);
        $response->assertInvalid('password');
        $response->assertInvalid('passport_info');
        $response->assertInvalid('surname');
        $response->assertInvalid('name');
        $response->assertInvalid('email');
    }
}
