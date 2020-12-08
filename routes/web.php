<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Genre;
use App\Models\gameCRUD;
use App\Models\Profile;

use App\Http\Controllers\User\activityController;           
use App\Http\Controllers\gameController;

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
    return redirect()->route('profile.show',Auth::user()->id);
})->name('myprofile');
Route::get('profile/{id}', [App\Http\Controllers\UserProfileController::class, 'show'])->name('profile.show');
Route::get('myprofile', [App\Http\Controllers\UserProfileController::class, 'show'])->middleware('verified')->name('myprofile.show');
Route::post('profile/updateProfile/{id}', [App\Http\Controllers\UserProfileController::class, 'update_avatar'])->middleware('auth')->name('profile.update');
Route::post('profile/updateProfile/{id}/about', [App\Http\Controllers\UserProfileController::class, 'update_about'])->middleware('auth')->name('profile.updateAbout');
Route::get('/search',[App\Http\Controllers\SearchController::class,'search'])->name('search');
Route::get('/gameIndex', [App\Http\Controllers\gameController::class, 'index'])->middleware('admin')->name('gameIndex');
Route::get('/gameEdit', [App\Http\Controllers\gameController::class, 'edit'])->middleware('admin')->name('gameEdit');
Route::post('/gameUpdate/{id}', [App\Http\Controllers\gameController::class, 'update'])->middleware('admin')->name('game.Update');
//Route::get('/profile/{id}',[App\Http\Controllers\FriendsController::class, 'show'])->name('profile.show');
Route::get('{id}/pending',[App\Http\Controllers\UserProfileController::class, 'showRequest'])->middleware('auth')->name('friends.pending');
Route::get('{id}/pending/accept/{username}',[App\Http\Controllers\FriendsController::class, 'accept'])->middleware('auth')->name('friends.accept');
Route::get('{id}/friends/{username}/{action}',[App\Http\Controllers\FriendsController::class, 'store'])->middleware('auth')->name('friends.add');
Route::resource('gameView',App\Http\Controllers\gameController::class);
Route::resource('game',App\Http\Controllers\Game\gameUserController::class);
Route::resource('friends',App\Http\Controllers\FriendsController::class);
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('profile/{id}/post/{posted_by}',[App\Http\Controllers\User\userPostController::class,'store'])->middleware('auth')->name('post.store');
Route::get('post/{post_id}/addLike/{id}',[App\Http\Controllers\User\userPostController::class,'addLike'])->middleware('auth')->name('post.addLike');
Route::post('post/{post_id}/addComment/{id}',[App\Http\Controllers\User\userPostController::class,'addComment'])->middleware('auth')->name('post.addComment');
Route::get('post/{post_id}/removeLike/{id}',[App\Http\Controllers\User\userPostController::class,'removeLike'])->middleware('auth')->name('post.removeLike');

Route::get('game/{game_id}/add',[App\Http\Controllers\Game\gameUserController::class,'store'])->middleware('auth')->name('game.store');
Route::get('game/{game_id}/review/store',[App\Http\Controllers\Game\gameUserController::class,'store_review'])->middleware('auth')->name('game.store_review');
Route::get('/profile/{id}/post', App\Http\Livewire\Profile::class)->middleware('auth');
Route::get('/profile/{id}/post/{posted_by}', App\Http\Livewire\Profile::class); 
Route::get('/game/{game_id}/addFav', [App\Http\Controllers\Game\gameUserController::class,'addFavourite'])->middleware('auth')->name('game.addFav'); 
Route::get('/game/{game_id}/removeFav', [App\Http\Controllers\Game\gameUserController::class,'removeFavourite'])->middleware('auth')->name('game.removeFav'); 

Route::get('/gamelist/genre/{id:title}',function(gameController $game,Genre $id){
    return $game->gameList($id);
})->name('gameList'); 
Route::get('/gamepage/{id:custom_url}',function (gameController $game, gameCRUD $id){
    return $game->show($id->id);})->name('game.show');
Route::get('/gamelist/all',function(gameController $game){
    return $game->gameList('all');
})->name('gamelist.all'); 
Route::get('/activities/{id:username}', function (activityController $activity, Profile $id ){
    return $activity->show($id->id);
})->middleware('auth')->name('activity');
Route::get('review/{id}/{user_id}',[App\Http\Controllers\Game\gameUserController::class,'like_review'])->middleware('auth')->name('like.review');
Route::get('profile/{id}/detail',[App\Http\Controllers\UserProfileController::class, 'detail'])->name('profile.detail');
Route::get('profile/{id}/detail/delete/{game_id}',[App\Http\Controllers\UserProfileController::class, 'profile_gameDelete'])->name('profile.game_delete');
Route::get('addgame_toCollection/{username}/{game_id}',[App\Http\Controllers\UserProfileController::class, 'addgame_toCollection'])->middleware('auth')->name('addgame_toCollection');
Route::get('profile/ssss/detail/list',[App\Http\Controllers\UserProfileController::class, 'dataTable'])->name('dataTable');
Route::get('game/{game_id}/store_rating',[App\Http\Controllers\Game\gameUserController::class,'store_rating'])->middleware('auth')->name('store_rating');
Route::get('game/{game_id}/review/all',[App\Http\Controllers\gameController::class,'show_review'])->name('all_review');
Route::get('game/{game_id}/wishlist/{profile_id}/action',[App\Http\Controllers\userProfileController::class,'add_wishlist'])->middleware('auth')->name('add_wishlist');
//Route::get('profile/{id}/gameCollection/all',[App\Http\Controllers\userProfileController::class,'show_collection'])->name('show_collection');
Route::get('profile/{id}/gameCollection/{any}', function () {
    return view('profile.gameCollection');
})->where('any', '.*')->name('show_collection'); 
Route::get('/', function () {
    return redirect('homepage');
});
Route::get('homepage', [App\Http\Controllers\gameController::class,'welcome'])->name('homepage');
Route::get('/bantuan',[App\Http\Controllers\FrontController::class,'bantuan'])->name('bantuan');
Route::get('/bantuan/about_us',[App\Http\Controllers\FrontController::class,'about_us'])->name('about_us');
Route::get('/bantuan/report',[App\Http\Controllers\FrontController::class,'report'])->name('report');
Route::post('profile/{id}/change_password',[App\Http\Controllers\HomeController::class,'changePassword'])->middleware('auth')->name('changepassword');
Route::post('profile/addContact/{id}', [App\Http\Controllers\UserProfileController::class, 'add_contact'])->middleware('auth')->name('profile.addContact');
//vue Route::get('/{any}', [App\Http\Controllers\FrontController::class, 'index'])->where('any', '.*');
