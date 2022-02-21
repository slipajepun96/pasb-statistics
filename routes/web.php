<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EstateController;

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
    Route::view('/admin','admin.main')->name('main');

    //estate
    Route::post('/admin/estate/add',[EstateController::class,'store'])->name('estate-add-store');
    Route::get('/admin/estate',[EstateController::class,'index'])->name('estate-index');
    Route::get('/admin/estate/add',[EstateController::class,'add'])->name('estate-add');
    Route::get('/admin/estate/view/{id}',[EstateController::class,'view'])->name('estate-view');
    
});

