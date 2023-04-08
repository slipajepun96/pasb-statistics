<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EstateController;
use App\Http\Controllers\DailyYieldController;
use App\Http\Controllers\FFBYieldController;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\IndexController;
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

// Route::get('/', function () {
//     return view('index');
// });

// Route::view('/login','admin.login')->name('login');
// Route::view('/register','admin.register')->name('register');

//public-route

Route::middleware(['auth'],['preventBackHistory'])->group(function()
{
    Route::post('/ffbyield',[DailyYieldController::class,'dailyYieldIndex'])->name('ffbyield_search');
    
    Route::get('/',[IndexController::class,'index'])->name('index');
    Route::get('/ffbyield',[DailyYieldController::class,'dailyYieldIndex'])->name('ffbyield');
    Route::get('/monthly_report',[FFBYieldController::class,'monthlyReport'])->name('monthly_report');
    Route::get('/admin/ffb/daily_yield/print/{data_pass}',[DailyYieldController::class,'dailyYieldPDF'])->name('dailyYieldPDF');

    //user
    Route::post('/user/profile',[UserController::class,'changePassword'])->name('change-password');
    Route::get('/user/profile',[UserController::class,'profile'])->name('profile');
   
});

Route::middleware(['guest'],['preventBackHistory'])->group(function()
{
    Route::post('/firsttimelogin',[UserController::class,'firstTimeLoginPassword'])->name('first-time-login-password');
    Route::post('/set_password',[UserController::class,'registerUser'])->name('register-user'); 
    Route::get('/firsttimelogin',[UserController::class,'firstTimeLogin'])->name('firsttimelogin');
    Route::get('/set_password',[UserController::class,'set_password'])->name('set_password');
    
});

Route::middleware(['auth','admin'],['preventBackHistory'])->group(function()
{
 
    Route::post('/admin',[DailyYieldController::class,'index_monthsearch'])->name('index_monthsearch');
    Route::get('/admin',[DailyYieldController::class,'index'])->name('main');


    //estate
    Route::post('/admin/estate/add',[EstateController::class,'store'])->name('estate-add-store');
    Route::post('/admin/estate/edit/{id}',[EstateController::class,'update'])->name('estate-edit-update');
    Route::post('/admin/estate/delete/{id}',[EstateController::class,'delete'])->name('estate-delete');
    Route::post('/admin/estate/area/add',[EstateController::class,'areaEstateStore'])->name('area-estate-store');
    Route::get('/admin/estate',[EstateController::class,'index'])->name('estate-index');
    Route::get('/admin/estate/add',[EstateController::class,'add'])->name('estate-add');
    Route::get('/admin/estate/view/{id}',[EstateController::class,'view'])->name('estate-view');
    Route::get('/admin/estate/view/print/{id}',[PDFController::class,'estate_detail_pdf'])->name('estate-view-print');
    Route::get('/admin/estate/edit/{id}',[EstateController::class,'edit'])->name('estate-edit');
    Route::get('/admin/estate/area/{id}',[EstateController::class,'areaEstate'])->name('area-estate-index');

    //ffb daily yield
    Route::post('/admin/ffb/daily_yield/add',[DailyYieldController::class,'store'])->name('daily_yield-store');
    Route::post('/admin/ffb/daily_yield/edit/{id}',[DailyYieldController::class,'update'])->name('daily_yield-update');
    Route::post('/admin/ffb/daily_yield/delete/{id}',[DailyYieldController::class,'delete'])->name('daily_yield-delete');
    Route::get('/admin/ffb/daily_yield/add',[DailyYieldController::class,'add'])->name('daily_yield-add');
    Route::get('/admin/ffb/daily_yield/edit/{id}',[DailyYieldController::class,'edit'])->name('daily_yield-edit');

    //estate yield
    Route::get('/admin/ffb/estate_yield/add',[FFBYieldController::class,'addEstateYield'])->name('estate-yield');
   

    //budget
    Route::post('/admin/ffb/budget/add',[BudgetController::class,'store'])->name('budget-store');
    Route::post('/admin/ffb/budget/edit/{id}',[BudgetController::class,'update'])->name('budget-update');
    Route::post('/admin/ffb/budget/delete/{id}',[BudgetController::class,'delete'])->name('budget-delete');
    Route::get('/admin/ffb/budget/',[BudgetController::class,'index'])->name('budget-index');
    Route::get('/admin/ffb/budget/add',[BudgetController::class,'add'])->name('budget-add');
    Route::get('/admin/ffb/budget/view/{id}',[BudgetController::class,'view'])->name('budget-view');
    Route::get('/admin/ffb/budget/edit/{id}',[BudgetController::class,'edit'])->name('budget-edit');

    //user
    Route::post('/admin/user/{id}/downgrade',[UserController::class,'downgrade']);
    Route::post('/admin/user/{id}/upgrade',[UserController::class,'upgrade']);
    Route::post('/admin/user/register',[UserController::class,'tempRegisteredUserStore'])->name('temp-register-store');
    Route::post('/admin/user/delete/{id}',[UserController::class,'delete'])->name('user-delete');
    Route::post('/admin/user/delete/{id}',[UserController::class,'delete'])->name('user-delete');
    Route::post('/admin/user/temp/delete/{id}',[UserController::class,'tempUserDelete']);
    Route::get('/admin/user/register',[UserController::class,'tempRegisteredUser'])->name('register');
    Route::get('/admin/user/',[UserController::class,'index'])->name('user-index');
    

});

