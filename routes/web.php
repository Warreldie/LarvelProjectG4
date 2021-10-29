<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NFTController;
use App\Http\Controllers\UserController;

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
Route::get('/register', function () {return view('register');});
Route::get('/login', function () {return view('login');});
Route::get('/users', function () {return view('users/index');});

Route::get('/users/profile/{id}', [UserController::class, "profile"]);
Route::post('/users/profile/{id}/update', [UserController::class, "update"]);
Route::get('/users/profile/{id}/edit', [UserController::class, "edit"]);
Route::get('/users/profile/{id}/deletePicture', [UserController::class, "deletePicture"]);

Route::get('/nfts', [NFTController::class, 'index']);
Route::get('/nfts/create', [NFTController::class, 'create']);
Route::post('/nfts/store', [NFTController::class, 'store']);
Route::get('/nfts/{id}', [NFTController::class, 'details']);