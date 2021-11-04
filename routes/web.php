<?php
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NFTController;
use App\Http\Controllers\CollectionController;

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



Route::get('/users', function () {
    return view('users/index');
});
Route::get('/users/profile', function () {
    return view('users/profile');
});
Route::get('/nfts', [NFTController::class, 'index']);
Route::get('/nfts/create', [NFTController::class, 'create']);
Route::post('/nfts/store', [NFTController::class, 'store']);
Route::get('/nfts/{id}', [NFTController::class, 'details']);

Route::get('/collections', [CollectionController::class, 'index']);
Route::get('/collections/create', [CollectionController::class, 'create']);
Route::post('/collections/store', [CollectionController::class, 'store']);
Route::get('/collections/{id}', [CollectionController::class, 'details']);

