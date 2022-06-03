<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\ProductController;
use App\Http\Controllers\Site\CategoryController;
use App\Http\Controllers\Site\VerificationCodeController;
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

// =================================================================================== //

// For Mcamara Package

// ***************** Start Mcamara Package ****************** //

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {

    // =================================================================================== //

    // For All Users

    // , 'middleware' => 'guest:web'

    Route::group(['namespace'=>'Site'], function() {

        Route::get( '/', [HomeController::class, 'home']) -> name('home') -> middleware('VerifiedUser') ;

        Route::get( 'category/{slug}', [CategoryController::class, 'productsBySlug']) -> name('category') ;

        Route::get( 'product/{slug}', [ProductController::class, 'productsBySlug']) -> name('product.details') ;

    });

    // =================================================================================== //

    // Must be Authenticated User and Verified


    // 'auth:web' From 'config/auth.php'

    Route::group(['namespace'=>'Site', 'middleware' => 'auth:web', 'VerifiedUser'], function() {

        // ***************** Begin Routes ****************** //

        Route::get('profile', function(){
            return 'You are Authenticated';
        });

        // ***************** End Routes ****************** //

    });

    // =================================================================================== //

    // Must be Authenticated User


    Route::group(['namespace'=>'Site', 'middleware' => 'auth:web'], function() {

        // ***************** Begin Verify Routes ****************** //

        Route::post('verify-user', [VerificationCodeController::class, 'verify'])->name('verify-user');

        Route::post('verify', [VerificationCodeController::class, 'getVerifyPage'])->name('get.verification.form');

        // ***************** End Verify Routes ****************** //

    });

    // =================================================================================== //

});

// ***************** End Mcamara Package ****************** //

// =================================================================================== //

