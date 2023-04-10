<?php

namespace Tests\Feature\Admin;

use App\Http\Resources\UserResource;
use App\Models\BankBranch;
use App\Models\BonusRate;
use App\Models\Role;
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
    public function test_index_user_with_by_admin(): void
    {

        $users = User::factory(4)->create();
        $admin = User::create([
            'name' => 'Admin',
            'surname' => 'Giga',
            'email' => 'admin@admin.ru',
            'password' => Hash::make('admin@admin.ru'),
            'role_id' => 2,
        ]);

        $response = $this->actingAs($admin)->get('api/admin/users');

        $jsonUsers = UserResource::collection($users)->resolve();
        $this->assertDatabaseCount('users', 5);
        $response->assertJson($jsonUsers);

    }

    /** @test */
    public function test_create_user_with_valid_data_by_admin(){
        $createData = [
            'name' => 'Епифан',
            'surname' => 'Королев',
            'patronymic' => 'Попович',
            'email' => 'client@client.ru',
            'passport_info' => '2312 452398',
            'password' => 'client@client.ru',
            'password_confirmation' => 'client@client.ru',
            'role_id' => 0,
        ];
        $admin = User::create([
            'name' => 'Admin',
            'surname' => 'Giga',
            'email' => 'admin@admin.ru',
            'password' => Hash::make('admin@admin.ru'),
            'role_id' => 2,
        ]);

        $response = $this->actingAs($admin)->post('api/admin/users', $createData);
        unset($createData['password']);
        unset($createData['password_confirmation']);

        $response->assertOk();
        $this->assertDatabaseCount('users', 2);
        $response->assertJson($createData);
    }

    /** @test */
    public function test_create_user_with_invalid_data_by_admin()
    {
        $createData = [
            'password' => '12345678',
            'password_confirmation' => '123456',
        ];
        $admin = User::create([
            'name' => 'Admin',
            'surname' => 'Giga',
            'email' => 'admin@admin.ru',
            'password' => Hash::make('admin@admin.ru'),
            'role_id' => 2,
        ]);

        $response = $this->actingAs($admin)->post('api/admin/users', $createData);

        $response->assertStatus(422);
        $response->assertInvalid('password');
        $response->assertInvalid('role_id');
        $response->assertInvalid('surname');
        $response->assertInvalid('name');
        $response->assertInvalid('email');
    }

    public function test_update_user_with_valid_data_by_admin(): void
    {
        $user = User::factory()->create();
        $bankBranch = BankBranch::factory()->create();
        $bonusRate = BonusRate::factory()->create();
        $admin = User::create([
            'name' => 'Admin',
            'surname' => 'Giga',
            'email' => 'admin@admin.ru',
            'password' => Hash::make('admin@admin.ru'),
            'role_id' => 2,
        ]);

        $updatedUserData = [
            'name' => 'New',
            'surname' => 'User',
            'patronymic' => 'Dolbaeb',
            'email' => 'aaaa@aaaa.ru',
            'bank_branch_id' => 1,
            'bonus_rate_id' => 1,
            'passport_info' => '1231 764512',
            'role_id' => 2,
        ];

        $response = $this->actingAs($admin)->put('api/admin/users/' . $user->id, $updatedUserData);

        $response->assertOk();
        $response->assertJson($updatedUserData);

    }

    /** @test */
    public function test_show_user_by_admin()
    {
        $user = User::factory()->create();
        $admin = User::create([
            'name' => 'Admin',
            'surname' => 'Giga',
            'email' => 'admin@admin.ru',
            'password' => Hash::make('admin@admin.ru'),
            'role_id' => 2,
        ]);

        $response = $this->actingAs($admin)->get('api/admin/users/' . $user->id);

        $jsonUser = UserResource::make($user)->resolve();
        $this->assertDatabaseCount('users', 2);

        $response->assertJson($jsonUser);
    }
    /** @test */
    public function test_delete_user_by_admin()
    {
        $user = User::factory()->create();
        $admin = User::create([
            'name' => 'Admin',
            'surname' => 'Giga',
            'email' => 'admin@admin.ru',
            'password' => Hash::make('admin@admin.ru'),
            'role_id' => 2,
        ]);

        $response = $this->actingAs($admin)->delete('api/admin/users/' . $user->id);

        $response->assertOk();
        $this->assertDatabaseCount('users', 2);
        $this->assertSoftDeleted('users',UserResource::make($user)->resolve());
        $response->assertJson(['message' => 'Успешно удалено']);
    }

    /** @test */
    public function test_prohibit_delete_user_by_client()
    {
        $user = User::factory()->create();
        $admin = User::create([
            'name' => 'Admin',
            'surname' => 'Giga',
            'email' => 'admin@admin.ru',
            'password' => Hash::make('admin@admin.ru'),
            'role_id' => 0,
        ]);

        $response = $this->actingAs($admin)->delete('api/admin/users/' . $user->id);

        $response->assertStatus(403);
    }
}
