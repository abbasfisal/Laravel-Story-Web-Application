<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/hi', function () {

    return $s = \App\Models\Story::with(['comments.replies' ,'comments.user', 'comments.replies.user'])->where('id' , 3)->get();
});
