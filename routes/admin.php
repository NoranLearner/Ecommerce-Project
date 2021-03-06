<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\OptionsController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\VendorsController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AttributesController;
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

// 🔥 For Unpaid 🔥 //

// define('PAGINATION_COUNT',10);

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

        // For Admin Logout

        Route::get('logout', [LoginAdminController::class, 'logout'])->name('admin.logout');

        // ***************** Begin Admin Profile Routes ****************** //

        Route::group(['prefix'=>'profile'], function(){

            Route::get('edit', [ProfileController::class, 'edit'])->name('edit.profile');

            Route::put('update', [ProfileController::class, 'update'])->name('update.profile');

        });

        // ***************** End Admin Profile Routes ****************** //

        // ***************** Begin Languages Routes (For Unpaid)  ****************** //

        Route::group(['prefix'=>'languages'], function(){

            Route::get('/', [LanguageController::class, 'index'])->name('admin.languages');

            Route::get('create', [LanguageController::class, 'create'])->name('admin.languages.create');

            Route::post('store', [LanguageController::class, 'store'])->name('admin.languages.store');

            Route::get('edit/{id}', [LanguageController::class, 'edit'])->name('admin.languages.edit');

            Route::post('update/{id}', [LanguageController::class, 'update'])->name('admin.languages.update');

            Route::get('delete/{id}', [LanguageController::class, 'destroy'])->name('admin.languages.delete');
        });

        // ***************** End Languages Routes ****************** //

        // ***************** Begin Main Categories Routes (For Unpaid & Paid) ****************** //

        Route::group(['prefix'=>'main_categories'], function(){

            Route::get('/', [MainCategoriesController::class, 'index'])->name('admin.mainCategories');

            Route::get('create', [MainCategoriesController::class, 'create'])->name('admin.mainCategories.create');

            Route::post('store', [MainCategoriesController::class, 'store'])->name('admin.mainCategories.store');

            Route::get('edit/{id}', [MainCategoriesController::class, 'edit'])->name('admin.mainCategories.edit');

            Route::post('update/{id}', [MainCategoriesController::class, 'update'])->name('admin.mainCategories.update');

            Route::get('delete/{id}', [MainCategoriesController::class, 'destroy'])->name('admin.mainCategories.delete');

            // 🔥 For Unpaid 🔥 //

            Route::get('changeStatus/{id}', [MainCategoriesController::class, 'changeStatus']) -> name('admin.mainCategories.status');
        });

        // ***************** End Main Categories Routes ****************** //

        // ***************** Begin Sub Categories Routes (For Unpaid & Paid) ****************** //

        Route::group(['prefix'=>'sub_categories'], function(){

            Route::get('/', [SubCategoriesController::class, 'index'])->name('admin.subCategories');

            Route::get('create', [SubCategoriesController::class, 'create'])->name('admin.subCategories.create');

            Route::post('store', [SubCategoriesController::class, 'store'])->name('admin.subCategories.store');

            Route::get('edit/{id}', [SubCategoriesController::class, 'edit'])->name('admin.subCategories.edit');

            Route::post('update/{id}', [SubCategoriesController::class, 'update'])->name('admin.subCategories.update');

            Route::get('delete/{id}', [SubCategoriesController::class, 'destroy'])->name('admin.subCategories.delete');

            // 🔥 For Unpaid 🔥 //

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

        // ***************** Begin Brands Routes ****************** //

        Route::group(['prefix'=>'brands', 'middleware' => 'can:brands'], function(){

            Route::get('/', [BrandController::class, 'index'])->name('admin.brands');

            Route::get('create', [BrandController::class, 'create'])->name('admin.brands.create');

            Route::post('store', [BrandController::class, 'store'])->name('admin.brands.store');

            Route::get('edit/{id}', [BrandController::class, 'edit'])->name('admin.brands.edit');

            Route::post('update/{id}', [BrandController::class, 'update'])->name('admin.brands.update');

            Route::get('delete/{id}', [BrandController::class, 'destroy'])->name('admin.brands.delete');

        });

        // ***************** End Brands Routes ****************** //

        // ***************** Begin Tags Routes ****************** //

        Route::group(['prefix'=>'tags','middleware' => 'can:tags'], function(){

            Route::get('/', [TagController::class, 'index'])->name('admin.tags');

            Route::get('create', [TagController::class, 'create'])->name('admin.tags.create');

            Route::post('store', [TagController::class, 'store'])->name('admin.tags.store');

            Route::get('edit/{id}', [TagController::class, 'edit'])->name('admin.tags.edit');

            Route::post('update/{id}', [TagController::class, 'update'])->name('admin.tags.update');

            Route::get('delete/{id}', [TagController::class, 'destroy'])->name('admin.tags.delete');

        });

        // ***************** End Tags Routes ****************** //

        // ***************** Begin Products Routes ****************** //

        Route::group(['prefix'=>'products','middleware' => 'can:products'], function(){

            Route::get('/', [ProductController::class, 'index'])->name('admin.products');

            Route::get('general-information', [ProductController::class, 'create'])->name('admin.products.general.create');

            Route::post('store-general-information', [ProductController::class, 'store'])->name('admin.products.general.store');

            // For price

            Route::get('price/{id}', [ProductController::class, 'getPrice'])->name('admin.products.price.create');

            Route::post('price', [ProductController::class, 'savePrice'])->name('admin.products.price.store');

            // For Images

            Route::get('images/{id}', [ProductController::class, 'addImages'])->name('admin.products.images.create');

            Route::post('images', [ProductController::class, 'saveImages'])->name('admin.products.images.store');

            Route::post('images/db', [ProductController::class, 'saveImagesDB'])->name('admin.products.images.store.db');

            // For Stock

            Route::get('stock/{id}', [ProductController::class, 'getStock'])->name('admin.products.stock.create');

            Route::post('stock', [ProductController::class, 'saveStock'])->name('admin.products.stock.store');

        });

        // ***************** End Products Routes ****************** //

        // ***************** Begin Attributes Routes ****************** //

        Route::group(['prefix'=>'attributes'], function(){

            Route::get('/', [AttributesController::class, 'index'])->name('admin.attributes');

            Route::get('create', [AttributesController::class, 'create'])->name('admin.attributes.create');

            Route::post('store', [AttributesController::class, 'store'])->name('admin.attributes.store');

            Route::get('edit/{id}', [AttributesController::class, 'edit'])->name('admin.attributes.edit');

            Route::post('update/{id}', [AttributesController::class, 'update'])->name('admin.attributes.update');

            Route::get('delete/{id}', [AttributesController::class, 'destroy'])->name('admin.attributes.delete');

        });

        // ***************** End Attributes Routes ****************** //

        // ***************** Begin Options Routes ****************** //

        Route::group(['prefix'=>'options','middleware' => 'can:options'], function(){

            Route::get('/', [OptionsController::class, 'index'])->name('admin.options');

            Route::get('create', [OptionsController::class, 'create'])->name('admin.options.create');

            Route::post('store', [OptionsController::class, 'store'])->name('admin.options.store');

            Route::get('edit/{id}', [OptionsController::class, 'edit'])->name('admin.options.edit');

            Route::post('update/{id}', [OptionsController::class, 'update'])->name('admin.options.update');

            Route::get('delete/{id}', [OptionsController::class, 'destroy'])->name('admin.options.delete');

        });

        // ***************** End Options Routes ****************** //

        // ***************** Begin Sliders Routes ****************** //

        Route::group(['prefix'=>'sliders'], function(){

            Route::get('/', [SliderController::class, 'addImages'])->name('admin.sliders.create');

            Route::post('images', [SliderController::class, 'saveSliderImages'])->name('admin.sliders.store');

            Route::post('images/db', [SliderController::class, 'saveSliderImagesDB'])->name('admin.sliders.store.db');

        });

        // ***************** End Sliders Routes ****************** //

        // ***************** Begin Roles Routes ****************** //

        Route::group(['prefix'=>'roles'], function(){

            Route::get('/', [RolesController::class, 'index'])->name('admin.roles.index');

            Route::get('create', [RolesController::class, 'create'])->name('admin.roles.create');

            Route::post('store', [RolesController::class, 'saveRole'])->name('admin.roles.store');

            Route::get('edit/{id}', [RolesController::class, 'edit'])->name('admin.roles.edit');

            Route::post('update/{id}', [RolesController::class, 'update'])->name('admin.roles.update');

        });

        // ***************** End Roles Routes ****************** //

        // ***************** Begin Users Routes ****************** //

        Route::group(['prefix'=>'users' , 'middleware' => 'can:users'], function(){

            Route::get('/', [UsersController::class, 'index'])->name('admin.users.index');

            Route::get('create', [UsersController::class, 'create'])->name('admin.users.create');

            Route::post('store', [UsersController::class, 'store'])->name('admin.users.store');

        });

        // ***************** End Users Routes ****************** //

        // ***************** Begin Settings Routes ****************** //

        Route::group(['prefix'=>'settings', 'middleware' => 'can:settings'], function(){

            Route::get('shipping-methods/{type}', [SettingsController::class, 'editShippingMethods'])->name('edit.shipping.methods');

            Route::put('shipping-methods/{id}', [SettingsController::class, 'updateShippingMethods'])->name('update.shipping.methods');

        });

        // ***************** End Settings Routes ****************** //

    });

    // =================================================================================== //

    Route::group(['namespace'=>'Admin', 'middleware' => 'guest:admin', 'prefix' => 'admin'], function() {

        // For Admin Login

        Route::get('login', [LoginAdminController::class, 'getLogin'])->name('admin.getLogin');

        Route::post('login', [LoginAdminController::class, 'postLogin'])->name('admin.postLogin');

    });

    // =================================================================================== //

});

// ***************** End Mcamara Package ****************** //

// =================================================================================== //
