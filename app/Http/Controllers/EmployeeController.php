<?php

namespace App\Http\Controllers;

use App\Domain\Employees\Models\Employee;
use App\Http\Resources\EmployeeResource;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EmployeeController extends Controller
{
    public function index()
    {
        return EmployeeResource::collection(Employee::paginate());
    }

    public function store(Request $request)
    {
        $employee = Employee::create($request->all());

        return (new EmployeeResource($employee))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Employee $employee)
    {
        return (new EmployeeResource($employee));
    }

    public function update(Request $request, Employee $employee)
    {
        $employee->update($request->all());

        return (new EmployeeResource($employee))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
