<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/nfts', function () {
    return view('nfts/index');
});
Route::get('/nfts/detail', function () {
    return view('nfts/detail');
});