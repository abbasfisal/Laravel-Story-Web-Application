<?php


use App\Http\Controllers\API\V1\Auth\AuthController;
use Illuminate\Support\Facades\Route;


/*
 |------------------------------
 | Auth
 |------------------------------
 |
 |
 |
 */
Route::post('register', [AuthController::class, 'register'])
     ->name('register');

Route::post('login', [AuthController::class, 'login'])
     ->name('login');

Route::post('logout', [AuthController::class, 'logOut'])
     ->name('logout')
     ->middleware('auth:sanctum ,can:is_admin');

/*
 |------------------------------
 | Admin Routes
 |------------------------------
 |
 |
 |
 */

Route::group(['prefix' => 'admin', 'middleware' => ['auth:sanctum', 'can:is_admin']], function () {

});
