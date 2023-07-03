<?php

// use App\Http\Controllers\PostsController;

use App\Http\Controllers\Adminapi\CategoryAdminController;
use App\Http\Controllers\user\AuthuserController;
use App\Http\Controllers\user\PropertyuserController;
use Illuminate\Support\Facades\Route;



Route::post('create', [PropertyuserController::class, 'create']);

Route::get('/category', [CategoryAdminController::class, 'index']);

Route::get('/category', 'App\Http\Controllers\Adminapi\CategoryAdminController@index');

Route::post('/category', 'App\Http\Controllers\Adminapi\CategoryAdminController@store');
Route::put('/category/{id}', 'App\Http\Controllers\Adminapi\CategoryAdminController@update');
Route::delete('/category/{id}', 'App\Http\Controllers\Adminapi\CategoryAdminController@destroy');
/**
 * ===============================================================================
 *  Any route in here is prefixed with `api` this routes for user to mobile
 * ===============================================================================
 */
Route::controller(AuthuserController::class)->group(function () {
    Route::post('login', [AuthuserController::class, 'login']);
    Route::post('register', [AuthuserController::class, 'register']);
    Route::post('create', [PropertyuserController::class, 'create']);
    Route::get('/category', [CategoryAdminController::class, 'index']);

// 
    
});
