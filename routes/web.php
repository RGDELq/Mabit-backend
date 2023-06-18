<?php

// use App\Http\Controllers\PostsController;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\PropertyController;
// use App\Models\category;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('products', ProductsController::class);
Route::resource('category', CategoryController::class);
Route::resource('property', PropertyController::class);



// Route::prefix('posts')->group(function () {
//     Route::get('index', [PostsController::class, 'index']);
//     Route::post('store', [PostsController::class, 'store']);
//     Route::post('edit', [PostsController::class, 'edit']);
//     Route::delete('destroy', [PostsController::class, 'destroy']);
// });
