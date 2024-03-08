<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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
    return view('auth.login');
});

Route::middleware(['auth'])->group(function(){
    Route::get('home', function () {
        return view('dashboard.index');
    })->name('home');

    Route::resource('manage-users', UserController::class);
    Route::resource('products', ProductController::class);

    Route::get('/profile', function () {
        return view('profile.index');
    })->name('profile');
});