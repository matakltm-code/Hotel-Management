<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomController;



Route::view('/', 'welcome');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// --------- Rooms Route --------
// | GET|HEAD  | /                      | App\Http\Controllers\RoomController@index
// | POST      | /                      | App\Http\Controllers\RoomController@store                             |
// | GET|HEAD  | {}                     | App\Http\Controllers\RoomController@show                              |
// | PUT|PATCH | {}                     | App\Http\Controllers\RoomController@update                            |
// | DELETE    | {}                     | App\Http\Controllers\RoomController@destroy                           |
// | GET|HEAD  | {}/edit                | App\Http\Controllers\RoomController@edit 
Route::resource('/rooms', RoomController::class);

// All laravel ui auth package routes
Auth::routes();

// Profile route
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index']);
Route::get('/profile/edit', [App\Http\Controllers\ProfileController::class, 'edit']);
Route::patch('/profile/{profile}', [App\Http\Controllers\ProfileController::class, 'update']);


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