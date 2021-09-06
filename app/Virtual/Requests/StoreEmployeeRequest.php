<?php


namespace App\Virtual\Requests;


/**
 * @OA\Schema(
 *      title="Store Employee request",
 *      description="Store Employee request body data",
 *      type="object",
 *      required={"name"}
 * )
 */
class StoreEmployeeRequest
{
    /**
     * @OA\Property(
     *      title="First Name",
     *      description="The first name of the employee",
     *      example="John"
     * )
     *
     * @var string
     */
    public $first_name;

    /**
     * @OA\Property(
     *      title="Last Name",
     *      description="The last name of the employee",
     *      example="Doe"
     * )
     *
     * @var string
     */
    public $last_name;

    /**
     * @OA\Property(
     *      title="Email",
     *      description="Employee's email",
     *      example="example@gmail.com"
     * )
     *
     * @var string
     */
    public $email;
}
