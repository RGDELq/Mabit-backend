<?php

use App\Http\Controllers\api\auth\AuthController;
use App\Http\Controllers\api\PropertyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

Route::middleware('auth:sanctum')->group(function() {

    Route::post('logout', [AuthController::class, 'logout']);
    // Route::get('/self-posts', [PostController::class, 'selfPosts']);
    Route::post('property', [PropertyController::class, 'store']);
    Route::put('property/{id}', [PropertyController::class, 'update']);
    Route::delete('property/{id}', [PropertyController::class, 'destroy']);
    // All the routes under authorized access including logout
    
    
});
