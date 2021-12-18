<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NFTController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\MarketController;
use App\Http\Controllers\FavoritesController;

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

Route::get('/', [NFTController::class, 'indexpage']);
//Register-blok
Route::get('/register', [UserController::class, 'register']);
Route::post('/register', [UserController::class, 'registerHandler']);
Route::get('/login', [UserController::class, 'login']);
Route::post('/login', [UserController::class, 'loginHandler']);
Route::get('/logout', [UserController::class, 'logout']);
//User-blok
Route::get('/profile/{id}', [UserController::class, "profile"]);
Route::post('/profile/{id}/update', [UserController::class, "update"]);
Route::get('/profile/{id}/edit', [UserController::class, "edit"]);
Route::get('/profile/{id}/deletePicture', [UserController::class, "deletePicture"]);
//NFT-blok
Route::get('/nfts', [NFTController::class, 'index']);
Route::get('/nfts/create', [NFTController::class, 'create']);
Route::post('/nfts/store', [NFTController::class, 'store']);
Route::get('/nfts/{id}', [NFTController::class, 'details']);
Route::get('/nfts/{id}/delete', [NFTController::class, "delete"]);
Route::get('/nfts/{id}/edit', [NFTController::class, "edit"]);
Route::post('/nfts/{id}/update', [NFTController::class, "update"]);

//Comments-Blok
Route::post('/nfts/comments/store', [CommentsController::class, 'store']);

//Favorite-Blok
Route::post('/nfts/Favorite/store', [FavoritesController::class, 'store']);

//Collection-Blok
Route::get('/collections', [CollectionController::class, 'index']);
Route::get('/collections/create', [CollectionController::class, 'create']);
Route::post('/collections/store', [CollectionController::class, 'store']);
Route::get('/collections/{id}', [CollectionController::class, 'details']);
Route::get('/collections/{id}/delete', [CollectionController::class, "delete"]);
Route::get('/collections/{id}/edit', [CollectionController::class, "edit"]);
Route::post('/collections/{id}/update', [CollectionController::class, "update"]);

//Market-Blok
Route::get('/market', [MarketController::class, 'index']);
