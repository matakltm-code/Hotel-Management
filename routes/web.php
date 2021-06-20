<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomController;

// Route::get('/', function () {
//     // IF the user logged in
//     if(Auth::check()){
//         return view('home');
//     }
//     // If not the user is not logged in
//     return view('guest.index');
// });

Auth::routes();



// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// --------- Rooms Route --------
// | GET|HEAD  | /                      | App\Http\Controllers\RoomController@index
// | POST      | /                      | App\Http\Controllers\RoomController@store                             |
// | GET|HEAD  | {}                     | App\Http\Controllers\RoomController@show                              |
// | PUT|PATCH | {}                     | App\Http\Controllers\RoomController@update                            |
// | DELETE    | {}                     | App\Http\Controllers\RoomController@destroy                           |
// | GET|HEAD  | {}/edit                | App\Http\Controllers\RoomController@edit 
Route::resource('/', RoomController::class);


// -------- Profile Route --------
// | GET|HEAD  | profile                | App\Http\Controllers\ProfileController@index                           |
// | POST      | profile                | App\Http\Controllers\ProfileController@store                           |
// | GET|HEAD  | profile/create         | App\Http\Controllers\ProfileController@create                          |
// | GET|HEAD  | profile/{profile}      | App\Http\Controllers\ProfileController@show                            |
// | PUT|PATCH | profile/{profile}      | App\Http\Controllers\ProfileController@update                          |
// | DELETE    | profile/{profile}      | App\Http\Controllers\ProfileController@destroy                         |
// | GET|HEAD  | profile/{profile}/edit | App\Http\Controllers\ProfileController@edit  
Route::resource('profile', ProfileController::class);