<?php

namespace App\Policies;

use App\Domain\Employees\Models\Employee;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EmployeePolicy
{
    use HandlesAuthorization;

    public function attachRestaurant(User $user, Employee $employee)
    {
        if ($employee->isWorkplaceLimitReached()) {
            return $this->deny('Workplace limit has been reached.');
        }
        return $this->allow();
    }
}
