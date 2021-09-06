<?php

namespace App\Http\Controllers;

use App\Domain\Employees\Models\Employee;
use App\Http\Resources\EmployeeResource;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EmployeeController extends Controller
{
    /**
     * @OA\Get(
     *      path="/employees",
     *      operationId="getEmployeesList",
     *      tags={"Employees"},
     *      summary="Get list of employees",
     *      description="Returns list of employees",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/EmployeeResource")
     *       ),
     *     )
     */
    public function index()
    {
        return EmployeeResource::collection(Employee::with('restaurants')->paginate());
    }

    /**
     * @OA\Post(
     *      path="/employees",
     *      operationId="storeEmployee",
     *      tags={"Employees"},
     *      summary="Store new employee",
     *      description="Returns employee data",
     *      security={
     *          {"passport": {}},
     *      },
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/StoreEmployeeRequest")
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Employee")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     */
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
