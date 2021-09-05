<?php

namespace App\Policies;

use App\Domain\Restaurants\Models\Restaurant;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RestaurantPolicy
{
    use HandlesAuthorization;

    public function attachEmployee(User $user, Restaurant $restaurant)
    {
        if ($restaurant->isEmploymentLimitReached()) {
            return $this->deny('Employment limit has been reached.');
        }
        return $this->allow();
    }
}
