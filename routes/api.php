<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\v1\TestController;
use App\Http\Controllers\api\v1\EmployeeController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/test', TestController::class);

Route::prefix('/employee')->group(function () {
    Route::middleware(['auth:sanctum', 'custom-auth:admin'])->group(function () {
        Route::get('/all', [EmployeeController::class, 'getAllEmployees']);
    });

    Route::post('/create', [EmployeeController::class, 'createNewEmployee']);
    Route::post('/signin', [EmployeeController::class, 'signinEmployee']);
});
