<?php

namespace App\Providers;

use App\Domain\Employees\Models\Employee;
use App\Domain\Restaurants\Models\Restaurant;
use App\Policies\EmployeePolicy;
use App\Policies\RestaurantPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Employee::class => EmployeePolicy::class,
        Restaurant::class => RestaurantPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        if (! $this->app->routesAreCached()) {
            Passport::routes();
        }
    }
}
