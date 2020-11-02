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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('profile', [App\Http\Controllers\UserProfileController::class, 'show'])->middleware('auth')->name('profile.show');
Route::post('profile', [App\Http\Controllers\UserProfileController::class, 'update_avatar'])->middleware('auth')->name('profile.update');
Route::get('/gameIndex', [App\Http\Controllers\gameController::class, 'index'])->name('gameIndex');
Route::get('/gameEdit', [App\Http\Controllers\gameController::class, 'edit'])->name('gameEdit');
Route::post('/gameUpdate/{id}', [App\Http\Controllers\gameController::class, 'update'])->name('game.Update');
Route::resource('gameView',App\Http\Controllers\gameController::class);