<?php

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

Route::get('/',  [NFTController::class, 'indexpage']);

Route::get('/register', function () {
    return view('register');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/users', function () {
    return view('users/index');
});
Route::get('/users/profile', function () {
    return view('users/profile');
});
Route::get('/nfts', [NFTController::class, 'index']);
//Route::get('/nfts/{{ id }})', [NFTController::class, 'index']);

Route::get('/nfts/detail', function () {
    return view('nfts/detail');
});

//Route::post('/nfts', [UserController::class, 'edit']);
//Route::post('/nfts', [UserController::class, 'destroy']);
