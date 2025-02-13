<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\DetailBlogController;
use App\Http\Controllers\DetailProjectController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'auth'])->name('auth');
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::get('/', [FrontendController::class, 'index'])->name('porto');
Route::get('/detail/{id}', [DetailProjectController::class, 'index'])->name('detail');
Route::get('/detail-blog/{id}', [DetailBlogController::class, 'index'])->name('detail-blog');




// Dashboard

Route::middleware(['auth'])->group(function () {
    Route::get('home', function () {
        return view('pages.dashboard', ['type_menu' => 'home']);
    })->name('home');


    Route::resource('about', AboutController::class);
    Route::resource('project', ProjectController::class);
    Route::resource('gallery', GalleryController::class);
    Route::resource('user', UserController::class);
    Route::resource('blog', BlogController::class);
});
