<?php

// use App\Http\Controllers\PostsController;

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\UserController;

use App\Http\Controllers\Admin\AuthController;
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

// Route::get('/w', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return redirect()->route('category');
});


// Route::get('/category', 'CategoryController@index')->name('category');
Route::resource('category', CategoryController::class);
Route::resource('property', PropertyController::class);
Route::resource('users', UserController::class);



Route::controller(AuthController::class)->group(function(){

    Route::get('login', 'index')->name('login');
    Route::get('registration', 'registration')->name('registration');
    Route::get('logout', 'logout')->name('logout');
    Route::post('validate_registration', 'validate_registration')->name('Auth.validate_registration');
    Route::post('validate_login', 'validate_login')->name('Auth.validate_login');
    Route::get('dashboard', 'dashboard')->name('dashboard');

});
// Show the form to create a new property.
// Route::get('properties/create', 'PropertyController.create')->name('properties.create');

// // Store a new property and its associated images.
// Route::post('/properties', 'PropertyController.store')->name('properties.store');

// // Show the list of properties and their associated images.
// Route::get('/properties', 'PropertyController.index')->name('properties.index');

