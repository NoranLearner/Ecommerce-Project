<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\CartController;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\PaymentController;
use App\Http\Controllers\Site\ProductController;
use App\Http\Controllers\Site\CategoryController;
use App\Http\Controllers\Site\WishlistController;
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

        // ***************** Begin Cart routes ****************** //

        Route::group(['prefix'=>'cart'], function(){

            Route::get('/', [CartController::class, 'getIndex'])->name('site.cart.index');

            Route::post('/cart/add/{slug?}', [CartController::class, 'postAdd'])->name('site.cart.add');

            Route::post('/update/{slug}', [CartController::class, 'postUpdate'])->name('site.cart.update');

            Route::post('/update-all', [CartController::class, 'postUpdateAll'])->name('site.cart.update-all');

        });

        // ***************** End Cart routes ****************** //

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

        // ***************** Begin Wishlist Routes ****************** //

        Route::post('wishlist', [WishlistController::class, 'store'])->name('wishlist.store');

        Route::delete('wishlist', [WishlistController::class, 'destroy'])->name('wishlist.destroy');

        Route::get('wishlist/products', [WishlistController::class, 'index'])->name('wishlist.products.index');

        // ***************** End Wishlist Routes ****************** //

        // ***************** Begin Payment routes ****************** //

        Route::get('payment/{amount}', [PaymentController::class, 'getPayments'])->name('payment');

        Route::post('payment', [PaymentController::class, 'processPayment'])->name('payment.process');

        // ***************** End Payment routes ****************** //

    });

    // =================================================================================== //

});

// ***************** End Mcamara Package ****************** //

// =================================================================================== //

