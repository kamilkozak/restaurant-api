<?php

namespace Database\Seeders;

use App\Domain\Restaurants\Models\Restaurant;
use Illuminate\Database\Seeder;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Restaurant::upsert([
            ['id' => 1, 'name' => 'MeatChefs', 'employment_limit' => config('config.restaurant.default_employment_limit')],
            ['id' => 2, 'name' => 'VegeChefs', 'employment_limit' => config('config.restaurant.default_employment_limit')],
            ['id' => 3, 'name' => 'BurgerChefs', 'employment_limit' => config('config.restaurant.default_employment_limit')],
        ], ['id']);
    }
}
