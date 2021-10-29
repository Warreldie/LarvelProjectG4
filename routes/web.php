<?php
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NFTController;

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
Route::get('/users/profile/{id}', [UserController::class, "profile"]);
Route::post('/users/profile/{id}/update', [UserController::class, "update"]);
Route::get('/users/profile/{id}/edit', [UserController::class, "edit"]);
Route::get('/users/profile/{id}/deletePicture', [UserController::class, "deletePicture"]);
//NFT-blok
Route::get('/nfts', [NFTController::class, 'index']);
Route::get('/nfts/create', [NFTController::class, 'create']);
Route::post('/nfts/store', [NFTController::class, 'store']);
Route::get('/nfts/{id}', [NFTController::class, 'details']);

