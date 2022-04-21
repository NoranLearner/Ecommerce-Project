<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginAdminController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// =================================================================================== //

// Note that the prefix is admin for all routes - In RouteServiceProvider

Route::group(['namespace'=>'Admin', 'middleware' => 'auth:admin'], function() {

    // The first page admin visits if admin authenticated

    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

});

// =================================================================================== //

Route::group(['namespace'=>'Admin', 'middleware' => 'guest:admin'], function() {

    Route::get('login', [LoginAdminController::class, 'getLogin'])->name('admin.getLogin');

    Route::post('login', [LoginAdminController::class, 'postLogin'])->name('admin.postLogin');

});
