<?php

// use App\Http\Controllers\PostsController;


use App\Http\Controllers\user\AuthuserController;
use App\Http\Controllers\user\PropertyuserController;
use Illuminate\Support\Facades\Route;

/**
 * ===============================================================================
 *  Any route in here is prefixed with `api/user`
 * ===============================================================================
 */





Route::controller(AuthuserController::class)->group(function () {
    Route::post('login', [AuthuserController::class, 'login']);
    Route::post('register', [AuthuserController::class, 'register']);
    Route::post('createproperty', [PropertyuserController::class, 'createproperty']);
// 
    
   
});
