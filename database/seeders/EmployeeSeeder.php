<?php

namespace Database\Seeders;

use App\Domain\Employees\Models\Employee;
use App\Domain\Restaurants\Models\Restaurant;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employee::factory()
            ->count(10)
            ->create()
            ->each(function (Employee $employee) {
                $restaurants = Restaurant::query()
                    ->has('employees', '<', config('config.restaurant.default_employment_limit'))
                    ->inRandomOrder()
                    ->limit(rand(1, config('config.employee.default_workplace_limit')))
                    ->get();
                $employee->restaurants()->sync($restaurants);
            });;
    }
}
