<?php


use App\Http\Controllers\API\V1\Admin\Category\CategoryController;
use App\Http\Controllers\API\V1\Auth\AuthController;
use App\Http\Controllers\API\V1\Home\HomeController;
use App\Http\Controllers\API\V1\User\Comment\CommentController;
use App\Http\Controllers\API\V1\User\Following\FollowingController;
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

        Route::post('/store', [StoryController::class, 'store'])
             ->name('store');

        Route::post('/like', [StoryController::class, 'like'])
             ->name('like');

    });

    /*
     |------------------------------
     | COMMENTS
     |------------------------------
     */
    Route::group(['prefix' => 'comment', 'as' => 'comment:'], function () {
        #URL => api/user/comment/
        #->name('user:comment:')
        Route::post('/add', [CommentController::class, 'add'])
             ->name('add');


        Route::post('/reply', [CommentController::class, 'reply'])
             ->name('reply');

    });

    /*
     |------------------------------
     | FOLLOWERS
     |------------------------------
     */


    Route::group(['prefix' => 'following', 'as' => 'following:'], function () {
        #URL => api/user/following/
        #->name('user:following:')

        Route::post('/add', [FollowingController::class, 'add'])
             ->name('add');

        //TODO unfollow

    });


});

/*
 |------------------------------
 | HOME ROUTE
 |------------------------------
 |
 |
 |
 */
Route::get('/', [HomeController::class, 'index'])
     ->name('index');

Route::get('/story/{story}/{title}', [HomeController::class, 'getStory'])
     ->name('get:story');

Route::get('/category/{category}/{title}', [HomeController::class, 'getStoriesByCategoryId'])
     ->name('stories:by:categoryId');


Route::get('/user/{user}/{username}', [HomeController::class, 'getStoriesByWriterId'])
     ->name('stories:by:userId');
