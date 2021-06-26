<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\AccountController;


Route::view('/', 'welcome');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/rooms', RoomController::class);

// All laravel ui auth package routes
Auth::routes();

// Profile route
Route::get('/profile', [ProfileController::class, 'index']);
Route::get('/profile/edit', [ProfileController::class, 'edit']);
Route::patch('/profile/{profile}', [ProfileController::class, 'update']);


// Services Pages
Route::prefix('services')->group(function () {
    // /services/food-services
    Route::get('/food-services', function () {
        return view('services.food-services');
    });

    // /services/tourist-attraction
    Route::get('/tourist-attraction', function () {
        return view('services.tourist-attraction');
    });

    // /services/about-us
    Route::get('/about-us', function () {
        return view('services.about-us');
    });

    // /services/contact-us
    Route::get('/contact-us', function () {
        return view('services.contact-us');
    });

    // /services/gallery
    Route::get('/gallery', function () {
        return view('services.gallery');
    });
});


// Admin
Route::get('/account', [AccountController::class, 'index']);
Route::post('/account', [AccountController::class, 'store']);
Route::get('/account/login-history', [AccountController::class, 'login_history']);
Route::post('/account/enable-disable', [AccountController::class, 'enable_disable_account']);
