<?php


namespace App\Virtual\Models;


/**
 * @OA\Schema(
 *     title="Employee",
 *     description="Employee model",
 *     @OA\Xml(
 *         name="Employee"
 *     )
 * )
 */
class Employee
{
    /**
     * @OA\Property(
     *     title="ID",
     *     description="ID",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    private $id;

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

    /**
     * @OA\Property(
     *     title="Created at",
     *     description="Created at",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $created_at;

    /**
     * @OA\Property(
     *     title="Updated at",
     *     description="Updated at",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $updated_at;

    /**
     * @OA\Property(
     *     title="Restaurants",
     *     description="Employee restaurants"
     * )
     *
     * @var \App\Virtual\Models\Restaurant[]
     */
    private $restaurants;
}
