<?php

namespace Tests\Feature;

use App\Domain\Employees\Models\Employee;
use App\Http\Controllers\EmployeeController;
use App\Models\User;
use Illuminate\Testing\Fluent\AssertableJson;
use Laravel\Passport\Passport;
use Tests\TestCase;

class SupplierTest extends TestCase
{
    /** @test */
    public function authorized_users_can_create_employee()
    {
        Passport::actingAs(
            User::factory()->create(),
        );

        $response = $this->postJson(action([EmployeeController::class, 'store']), [
                'first_name' => 'John',
                'last_name' => 'Doe',
                'email' => 'john.doe@example.com'
            ]
        );

        $response
            ->assertStatus(201)
            ->assertJson(function (AssertableJson $json) {
                $json
                    ->has('data.first_name')
                    ->has('data.last_name')
                    ->has('data.email');
            });
    }

    /** @test */
    public function index_shows_all_employees()
    {
        Employee::factory()->count(2)->create();

        $this->get(action([EmployeeController::class, 'index']))
            ->assertSuccessful()
            ->assertJson(function (AssertableJson $json) {
                $json
                    ->has('data', 2)
                    ->has('data.0', function (AssertableJson $json) {
                        $json
                            ->has('first_name')
                            ->has('last_name')
                            ->has('email')
                            ->etc();
                    })
                    ->etc();
            });
    }
}
