<?php

// use App\Http\Controllers\PostsController;

use App\Http\Controllers\Admin\RatingController;
use App\Http\Controllers\Adminapi\CategoryAdminController;
use App\Http\Controllers\user\AuthuserController;
use App\Http\Controllers\user\PropertyuserController;
use App\Http\Controllers\user\RatinguserController;
use Illuminate\Support\Facades\Route;


////////////////////////////////User Api///////////////////////
Route::post('create', [PropertyuserController::class, 'create']);
Route::get('get', [PropertyuserController::class, 'index']);


Route::get('/propertiesbycategory', [CategoryAdminController::class, 'propertybycategory']);



Route::post('createrating', [RatinguserController::class, 'create']);
Route::get('/getrating', 'App\Http\Controllers\user\RatinguserController@index');


Route::post('/createrating', 'App\Http\Controllers\user\RatinguserController@create');

Route::get('getrating', [RatinguserController::class, 'index']);

////////////////////////////////////////////////////////////////






/////////////////////////////Admin Api////////////////////////////
Route::get('/category', [CategoryAdminController::class, 'index']);
Route::get('/category', 'App\Http\Controllers\Adminapi\CategoryAdminController@index');
Route::post('/category', 'App\Http\Controllers\Adminapi\CategoryAdminController@store');
Route::put('/category/{id}', 'App\Http\Controllers\Adminapi\CategoryAdminController@update');
Route::delete('/category/{id}', 'App\Http\Controllers\Adminapi\CategoryAdminController@destroy');













Route::controller(AuthuserController::class)->group(function () {
    Route::post('login', [AuthuserController::class, 'login']);
    Route::post('register', [AuthuserController::class, 'register']);
    Route::post('create', [PropertyuserController::class, 'create']);
    Route::get('/category', [CategoryAdminController::class, 'index']);
    
});