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

Route::get('/', function () {
    return view('index');
});
Route::get('/register', [UserController::class, 'register']);
Route::post('/register', [UserController::class, 'registerHandler']);
Route::get('/login', [UserController::class, 'login']);
Route::post('/login', [UserController::class, 'loginHandler']);
Route::get('/logout', [UserController::class, 'logout']);



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
