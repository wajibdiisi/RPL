<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
Auth::routes(['verify' => true]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('profile/{id}', [App\Http\Controllers\UserProfileController::class, 'show'])->middleware('verified')->name('profile.show');
Route::post('profile', [App\Http\Controllers\UserProfileController::class, 'update_avatar'])->middleware('auth')->name('profile.update');
Route::get('/gameIndex', [App\Http\Controllers\gameController::class, 'index'])->name('gameIndex');
Route::get('/gameEdit', [App\Http\Controllers\gameController::class, 'edit'])->name('gameEdit');
Route::post('/gameUpdate/{id}', [App\Http\Controllers\gameController::class, 'update'])->name('game.Update');
Route::get('{id}/friends/{username}',[App\Http\Controllers\FriendsController::class, 'show'])->name('friends.profile');
Route::get('{id}/friends/{username}/add',[App\Http\Controllers\FriendsController::class, 'store'])->name('friends.add');
Route::resource('gameView',App\Http\Controllers\gameController::class);
Route::resource('friends',App\Http\Controllers\FriendsController::class);
Route::get('profile', function (){
    return redirect()->route('profile.show',session()->get('username'));
});
Auth::routes();
Route::get('/{any}', [App\Http\Controllers\FrontController::class, 'index'])->where('any', '.*');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
