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

Route::group(['middleware' => 'auth'], function () {
    Route::get('/wallet', function () {
        return view('wallet-page');
    })->name('wallet');

    Route::get('/mempool', function () {
        return view('mempool-page');
    })->name('mempool');

    Route::get('/blocs', function () {
        return view('bloc-list-page');
    })->name('blocs');

    Route::group(['middleware' => 'admin'], function () {
        Route::get('/users', function () {
            return view('users-page');
        })->name('users');
    });

    Route::group(['middleware' => 'validator'], function () {
        Route::get('/validate-bloc', function () {
            return view('bloc-validation-page');
        })->name('validate-bloc');
    });
});

Route::get('/login', function () {
    return view('login-page');
})->name('login');

Route::get('/register', function () {
    return view('register-page');
})->name('register');

Route::get('/logout', function () {
    auth()->logout();
    return redirect('/');
})->name('logout');
