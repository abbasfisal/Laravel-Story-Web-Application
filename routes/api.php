<?php


use App\Http\Controllers\API\V1\Admin\Category\CategoryController;
use App\Http\Controllers\API\V1\Auth\AuthController;
use App\Http\Controllers\API\V1\User\Story\StoryController;
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
     ->middleware('auth:sanctum');

/*
 |------------------------------
 | Admin Routes
 |------------------------------
 |
 |
 |
 */

Route::group(['prefix' => 'admin', 'as' => 'admin:', 'middleware' => ['auth:sanctum', 'can:is_admin']], function () {
    #URL => api/admin/
    # ->name('admin:')

    /*
     |------------------------------
     | CATEGORY GROUP
     |------------------------------
     */

    Route::group(['prefix' => 'category/', 'as' => 'category:'], function () {
        #URL => api/admin/category
        # ->name('admin:category:')

        Route::post('/store', [CategoryController::class, 'store'])
             ->name(':store');
    });

});


/*
 |------------------------------
 | USER ROUTE GROUP
 |------------------------------
 |
 |
 |
 */

Route::group(['prefix' => 'user', 'as' => 'user:', 'middleware' => 'auth:sanctum'], function () {
    #URL => api/user/
    #->name('user:')

    /*
     |------------------------------
     | STORY
     |------------------------------
     */
    Route::group(['prefix' => 'story', 'as' => 'story:'], function () {
        #URL => api/user/story/
        #->name('user:story:')

        Route::post('/store', [StoryController::class , 'store'])
             ->name('store');
    });

});
