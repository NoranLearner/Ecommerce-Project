<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Front Routes
|--------------------------------------------------------------------------
|
| Here is where you can register front routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', function () { return view('front.home'); });

// =================================================================================== //

// For Mcamara Package

// ***************** Start Mcamara Package ****************** //

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {

    // =================================================================================== //

    // Must be Authenticated User

    // 'auth:web' From 'config/auth.php'

    Route::group(['namespace'=>'Site', 'middleware' => 'auth:web'], function() {

        // ***************** Begin Routes ****************** //
        // ***************** End Routes ****************** //

    });

    // =================================================================================== //

    Route::group(['namespace'=>'Site', 'middleware' => 'guest:web'], function() {

        // For User Login

        // Route::get('login', [LoginController::class, 'getLogin'])->name('getLogin');

        // Route::post('login', [LoginController::class, 'postLogin'])->name('postLogin');

    });

    // =================================================================================== //

});

// ***************** End Mcamara Package ****************** //

// =================================================================================== //
