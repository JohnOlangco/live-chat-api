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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', function() {
    return ;
})->name('login');

// Group Routing
// Route::group(['prefix' => 'admin'], function() {
//     Route::get('/dashboard', function() {
//         return 'Admin Dashboard';
//     });

//     Route::get('/users', function() {
//         return 'Admin Users';
//     });
// });

// Group Routing with Middleware
Route::group(['middleware' => 'auth'], function() {
    Route::get('/profile', function() {
        return 'User Profile';
    });

    Route::get('/settings', function() {
        return 'User Settings';
    });
});

// Combining Prefix and Middleware
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('dashboard', function() {
        return 'Admin Dashboard';
    });

    Route::get('/users', function() {
        return 'Admin Users';
    });
});