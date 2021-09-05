<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeRestaurantController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'v1'], function () {

    Route::get('employees', [EmployeeController::class, 'index']);
    Route::get('employees/{employee}', [EmployeeController::class, 'show']);

    Route::group(['middleware' => ['auth:api']], function () {

        Route::post('employees', [EmployeeController::class, 'store']);
        Route::put('employees/{employee}', [EmployeeController::class, 'update']);
        Route::delete('employees/{employee}', [EmployeeController::class, 'destroy']);

        Route::put('employees/{employee}/restaurants/{restaurant}', [EmployeeRestaurantController::class, 'update']);
        Route::delete('employees/{employee}/restaurants/{restaurant}', [EmployeeRestaurantController::class, 'destroy']);

        Route::get('/user', function (Request $request) {
            return $request->user();
        });

    });

});
