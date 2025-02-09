<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/', [LoginController::class, 'auth'])->name('auth');
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');


// Dashboard

Route::middleware(['auth'])->group(function () {
    Route::get('home', function () {
        return view('pages.dashboard', ['type_menu' => 'home']);
    })->name('home');


    Route::resource('about', AboutController::class);
    Route::resource('project', ProjectController::class);
});
