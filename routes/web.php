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

// Route::view('/login','admin.login')->name('login');
// Route::view('/register','admin.register')->name('register');

Route::middleware(['web'],['preventBackHistory'])->group(function()
{
    Route::view('/main','admin.main')->name('main');
    
});

