<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('profile/{id}',[App\Http\Controllers\userProfileController::class,'show_collection']);
Route::get('get_collection/{collection_id}',[App\Http\Controllers\userProfileController::class,'single_collection']);
Route::post('profile/{id}/new_collection', [App\Http\Controllers\userProfileController::class,'new_collection']);
Route::delete('delete_fromCollection/{collection_id}/delete/{game_id}',[App\Http\Controllers\userProfileController::class,'delete_fromCollection']);
