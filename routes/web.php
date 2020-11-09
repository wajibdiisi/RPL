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


Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile', function (){
    return redirect()->route('profile.show',session()->get('username'));
})->name('myprofile');
Route::get('profile/{id}', [App\Http\Controllers\UserProfileController::class, 'show'])->name('profile.show');
Route::get('myprofile', [App\Http\Controllers\UserProfileController::class, 'show'])->middleware('verified')->name('myprofile.show');
Route::post('profile/updateProfile/{id}', [App\Http\Controllers\UserProfileController::class, 'update_avatar'])->middleware('auth')->name('profile.update');
Route::get('/search',[App\Http\Controllers\SearchController::class,'search'])->middleware('auth')->name('search');
Route::get('/gameIndex', [App\Http\Controllers\gameController::class, 'index'])->name('gameIndex');
Route::get('/gameEdit', [App\Http\Controllers\gameController::class, 'edit'])->name('gameEdit');
Route::post('/gameUpdate/{id}', [App\Http\Controllers\gameController::class, 'update'])->name('game.Update');
//Route::get('/profile/{id}',[App\Http\Controllers\FriendsController::class, 'show'])->name('profile.show');
Route::get('{id}/pending',[App\Http\Controllers\UserProfileController::class, 'showRequest'])->middleware('auth')->name('friends.pending');
Route::get('{id}/pending/accept/{username}',[App\Http\Controllers\FriendsController::class, 'accept'])->middleware('auth')->name('friends.accept');
Route::get('{id}/friends/{username}/add',[App\Http\Controllers\FriendsController::class, 'store'])->middleware('auth')->name('friends.add');
Route::resource('gameView',App\Http\Controllers\gameController::class);
Route::resource('game',App\Http\Controllers\Game\gameUserController::class);
Route::resource('friends',App\Http\Controllers\FriendsController::class);
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('profile/{id}/post/{posted_by}',[App\Http\Controllers\User\userPostController::class,'store'])->name('post.store');
Route::get('post/{post_id}/addLike/{id}',[App\Http\Controllers\User\userPostController::class,'addLike'])->name('post.addLike');
Route::post('post/{post_id}/addComment/{id}',[App\Http\Controllers\User\userPostController::class,'addComment'])->name('post.addComment');
Route::get('post/{post_id}/removeLike/{id}',[App\Http\Controllers\User\userPostController::class,'removeLike'])->name('post.removeLike');
Route::get('game/{id]',[App\Http\Controllers\Game\gameUserController::class,'show'])->name('game.show');
Route::get('game/add/{game_id}',[App\Http\Controllers\Game\gameUserController::class,'store'])->name('game.store');
Route::get('/profile/{id}/post', App\Http\Livewire\Profile::class);
Route::get('/profile/{id}/post/{posted_by}', App\Http\Livewire\Profile::class); 

//vue Route::get('/{any}', [App\Http\Controllers\FrontController::class, 'index'])->where('any', '.*');
