<?php

namespace App\Http\Controllers;

use App\Domain\Employees\Models\Employee;
use App\Domain\Restaurants\Models\Restaurant;
use App\Http\Resources\EmployeeResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class EmployeeRestaurantController extends Controller
{
    public function update(Request $request, Employee $employee, Restaurant $restaurant)
    {
        Gate::authorize('attachRestaurant', $employee);
        Gate::authorize('attachEmployee', $restaurant);

        $employee->restaurants()->syncWithoutDetaching($restaurant);

        return (new EmployeeResource($employee))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Employee $employee, Restaurant $restaurant)
    {
        $employee->restaurants()->detach($restaurant);
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
