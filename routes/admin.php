<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\LanguageController;
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

define('PAGINATION_COUNT',10);

// =================================================================================== //

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// Note that the prefix is admin for all routes - In RouteServiceProvider

// =================================================================================== //

Route::group(['namespace'=>'Admin', 'middleware' => 'auth:admin'], function() {

    // The first page admin visits if admin authenticated

    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

    // ***************** Begin Languages Routes ****************** //

    Route::group(['prefix'=>'languages'], function(){

        Route::get('/', [LanguageController::class, 'index'])->name('admin.languages');

        Route::get('create', [LanguageController::class, 'create'])->name('admin.languages.create');

        Route::post('store', [LanguageController::class, 'store'])->name('admin.languages.store');

        Route::get('edit/{id}', [LanguageController::class, 'edit'])->name('admin.languages.edit');

        Route::post('update/{id}', [LanguageController::class, 'update'])->name('admin.languages.update');

        Route::get('delete/{id}', [LanguageController::class, 'destroy'])->name('admin.languages.delete');
    });

    // ***************** End Languages Routes ****************** //

});

// =================================================================================== //

Route::group(['namespace'=>'Admin', 'middleware' => 'guest:admin'], function() {

    Route::get('login', [LoginAdminController::class, 'getLogin'])->name('admin.getLogin');

    Route::post('login', [LoginAdminController::class, 'postLogin'])->name('admin.postLogin');

});
