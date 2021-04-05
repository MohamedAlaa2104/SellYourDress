<?php

use App\Http\Controllers\Dashboard\Category\CategoryController;
use App\Http\Controllers\Dashboard\ContactUs\ContactUsController;
use App\Http\Controllers\Dashboard\Home\HomeController;
use App\Http\Controllers\Dashboard\Product\ProductController;
use App\Http\Controllers\Dashboard\Role\RoleController;
use App\Http\Controllers\Dashboard\User\UserController;
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

Route::group(['prefix' => LaravelLocalization::setLocale() ,'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function()
{
    /***************************************************  Routes For Website  ***************************************************/

    Route::get('/', function () {
        return view('app.home.home');
    });

    Auth::routes();

    /***************************************************  Routes For Dashboard  ***************************************************/

    Route::group(['as'=>'dashboard.','prefix'=>'dashboard', 'middleware' => ['auth','hasAnyPermission']], function() {
        Route::get('/', [HomeController::class, 'index'])->name('index');

        /***************************************************  Routes For Roles  ***************************************************/

        Route::resource('roles', RoleController::class);

        /***************************************************  Routes For Users  ***************************************************/

        Route::resource('users', UserController::class);
        Route::get('users-table', [UserController::class, 'usersTable'])->name('users-table');

        /***************************************************  Routes For Categories  ***************************************************/

        Route::resource('categories', CategoryController::class)->only(['index','store','update','destroy']);
        Route::get('categories-table', [CategoryController::class, 'categoriesTable'])->name('categories-table');

        /***************************************************  Routes For Products  ***************************************************/

        Route::resource('products', ProductController::class);
        Route::get('products-table', [ProductController::class, 'productsTable'])->name('products-table');
        Route::post('products-ajax-buttons', [ProductController::class, 'ajaxButtons'])->name('ajax-buttons');

        /***************************************************  Routes For Products  ***************************************************/

        Route::resource('contactus', ContactUsController::class)->only(['index', 'show', 'destroy']);
        Route::get('contactus-table', [ContactUsController::class, 'contactUsTable'])->name('contactus-table');
    });

});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
