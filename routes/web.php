<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EstateController;
use App\Http\Controllers\DailyYieldController;
use App\Http\Controllers\PDFController;

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
    Route::get('/admin',[DailyYieldController::class,'index'])->name('main');

    //estate
    Route::post('/admin/estate/add',[EstateController::class,'store'])->name('estate-add-store');
    Route::post('/admin/estate/edit/{id}',[EstateController::class,'update'])->name('estate-edit-update');
    Route::post('/admin/estate/delete/{id}',[EstateController::class,'delete'])->name('estate-delete');
    Route::get('/admin/estate',[EstateController::class,'index'])->name('estate-index');
    Route::get('/admin/estate/add',[EstateController::class,'add'])->name('estate-add');
    Route::get('/admin/estate/view/{id}',[EstateController::class,'view'])->name('estate-view');
    Route::get('/admin/estate/view/print/{id}',[PDFController::class,'estate_detail_pdf'])->name('estate-view-print');
    Route::get('/admin/estate/edit/{id}',[EstateController::class,'edit'])->name('estate-edit');

    //ffb daily yield
    Route::post('/admin/ffb/daily_yield/add',[DailyYieldController::class,'store'])->name('daily_yield-store');
    Route::post('/admin/ffb/daily_yield/edit/{id}',[DailyYieldController::class,'update'])->name('daily_yield-update');
    Route::post('/admin/ffb/daily_yield/delete/{id}',[DailyYieldController::class,'delete'])->name('daily_yield-delete');
    Route::get('/admin/ffb/daily_yield/add',[DailyYieldController::class,'add'])->name('daily_yield-add');
    Route::get('/admin/ffb/daily_yield/edit/{id}',[DailyYieldController::class,'edit'])->name('daily_yield-edit');
    
    
});

