
<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers as Controllers;

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth',
], function () {

    // Public authentication route
    Route::post('login', [Controllers\AuthController::class, 'login']);

    // Protected authentication routes
    Route::middleware('auth:api')->group(function () {
        Route::post('logout', [Controllers\AuthController::class, 'logout']);
        Route::post('refresh', [Controllers\AuthController::class, 'refresh']);
        Route::get('me', [Controllers\AuthController::class, 'me']);
    });
});


Route::post('register', [
    Controllers\RegistrationController::class,
    'register'
]);

/*
|--------------------------------------------------------------------------
| Public API Resources
|--------------------------------------------------------------------------
*/

Route::apiResources([
    'students' => Controllers\StudentController::class,
    'permissions' => Controllers\PermissionController::class,
    'roles' => Controllers\RoleController::class,
    'addresses' => Controllers\AddressController::class,
    'student-details' => Controllers\StudentDetailController::class,
]);
