<?php


namespace App\Virtual\Resources;


/**
 * @OA\Schema(
 *     title="EmployeeResource",
 *     description="Employee resource",
 *     @OA\Xml(
 *         name="EmployeeResource"
 *     )
 * )
 */
class EmployeeResource
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var \App\Virtual\Models\Employee[]
     */
    private $data;
}
