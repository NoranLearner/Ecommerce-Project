<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\VendorsController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginAdminController;
use App\Http\Controllers\Admin\SubCategoriesController;
use App\Http\Controllers\Admin\MainCategoriesController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

// Route::get('/home', [HomeController::class, 'index'])->name('home');

// =================================================================================== //

// For Mcamara Package

// ***************** Start Mcamara Package ****************** //

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {

    // =================================================================================== //

    // Note that the prefix is admin for all routes - In RouteServiceProvider

    // =================================================================================== //

    Route::group(['namespace'=>'Admin', 'middleware' => 'auth:admin', 'prefix' => 'admin'], function() {

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

        // ***************** Begin Main Categories Routes ****************** //

        Route::group(['prefix'=>'main_categories'], function(){

            Route::get('/', [MainCategoriesController::class, 'index'])->name('admin.mainCategories');

            Route::get('create', [MainCategoriesController::class, 'create'])->name('admin.mainCategories.create');

            Route::post('store', [MainCategoriesController::class, 'store'])->name('admin.mainCategories.store');

            Route::get('edit/{id}', [MainCategoriesController::class, 'edit'])->name('admin.mainCategories.edit');

            Route::post('update/{id}', [MainCategoriesController::class, 'update'])->name('admin.mainCategories.update');

            Route::get('delete/{id}', [MainCategoriesController::class, 'destroy'])->name('admin.mainCategories.delete');

            Route::get('changeStatus/{id}', [MainCategoriesController::class, 'changeStatus']) -> name('admin.mainCategories.status');
        });

        // ***************** End Main Categories Routes ****************** //

        // ***************** Begin Sub Categories Routes ****************** //

        Route::group(['prefix'=>'sub_categories'], function(){

            Route::get('/', [SubCategoriesController::class, 'index'])->name('admin.subCategories');

            Route::get('create', [SubCategoriesController::class, 'create'])->name('admin.subCategories.create');

            Route::post('store', [SubCategoriesController::class, 'store'])->name('admin.subCategories.store');

            Route::get('edit/{id}', [SubCategoriesController::class, 'edit'])->name('admin.subCategories.edit');

            Route::post('update/{id}', [SubCategoriesController::class, 'update'])->name('admin.subCategories.update');

            Route::get('delete/{id}', [SubCategoriesController::class, 'destroy'])->name('admin.subCategories.delete');

            Route::get('changeStatus/{id}', [SubCategoriesController::class, 'changeStatus']) -> name('admin.subCategories.status');
        });

        // ***************** End Sub Categories Routes ****************** //

        // ***************** Begin Vendors Routes ****************** //

        Route::group(['prefix'=>'vendors'], function(){

            Route::get('/', [VendorsController::class, 'index'])->name('admin.vendors');

            Route::get('create', [VendorsController::class, 'create'])->name('admin.vendors.create');

            Route::post('store', [VendorsController::class, 'store'])->name('admin.vendors.store');

            Route::get('edit/{id}', [VendorsController::class, 'edit'])->name('admin.vendors.edit');

            Route::post('update/{id}', [VendorsController::class, 'update'])->name('admin.vendors.update');

            Route::get('delete/{id}', [VendorsController::class, 'destroy'])->name('admin.vendors.delete');

            Route::get('changeStatus/{id}', [VendorsController::class, 'changeStatus']) -> name('admin.vendors.status');
        });

        // ***************** End Vendors Routes ****************** //

        // ***************** Begin Settings Routes ****************** //

        Route::group(['prefix'=>'settings'], function(){

            Route::get('shipping-methods/{type}', [SettingsController::class, 'editShippingMethods'])->name('edit.shipping.methods');

            Route::post('shipping-methods/{id}', [SettingsController::class, 'updateShippingMethods'])->name('update.shipping.methods');

        });

        // ***************** End Settings Routes ****************** //

    });

    // =================================================================================== //

    Route::group(['namespace'=>'Admin', 'middleware' => 'guest:admin', 'prefix' => 'admin'], function() {

        Route::get('login', [LoginAdminController::class, 'getLogin'])->name('admin.getLogin');

        Route::post('login', [LoginAdminController::class, 'postLogin'])->name('admin.postLogin');

    });

    // =================================================================================== //

});

// ***************** End Mcamara Package ****************** //

// =================================================================================== //
