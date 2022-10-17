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
    return view('welcome');
});

Auth::routes();




Route::prefix('admin')->group(function (){

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('dashboard',[App\Http\Controllers\Admin\DashboardController::class, 'index']);
    Route::resource('products', 'App\Http\Controllers\ProductController');
    Route::resource('categories', 'App\Http\Controllers\CategoryController');
    Route::resource('customers', 'App\Http\Controllers\CustomerController');
    Route::resource('users', 'App\Http\Controllers\UserController');
    Route::resource('invoices', 'App\Http\Controllers\InvoicesController');


    Route::get('/search/', [App\Http\Controllers\CategoryController::class,'search'])->name('search');
    Route::get('/searchUsers/', [App\Http\Controllers\UserController::class,'searchUsers'])->name('searchUsers');
    Route::get('/searchProducts/', [App\Http\Controllers\ProductController::class,'searchProducts'])->name('searchProducts');
});
