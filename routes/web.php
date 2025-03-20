<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/rsa-key-generation', function () {
    return view('rsa-key-generation-page');
});

Route::get('/hash-text', function () {
    return view('hash-text-page');
});

Route::get('/wallet', function () {
    return view('wallet-page');
});

Route::get('/login', function () {
    return view('login-page');
});

Route::get('/register', function () {
    return view('register-page');
});
