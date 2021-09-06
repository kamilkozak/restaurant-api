<?php


namespace App\Virtual\Models;

/**
 * @OA\Schema(
 *     title="Restaurant",
 *     description="Restaurant model",
 *     @OA\Xml(
 *         name="Restaurant"
 *     )
 * )
 */
class Restaurant
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
     *      title="Name",
     *      description="Name of the restaurant",
     *      example="MeatChefs"
     * )
     *
     * @var string
     */
    public $name;
}
