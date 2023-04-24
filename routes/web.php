<?php

use App\Http\Controllers\Admin\VehicleController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\AgentController;
use App\Http\Controllers\Admin\FirmController;
use App\Http\Controllers\Admin\DeveloperController;
use App\Http\Controllers\Admin\VisitorController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\HomeController;

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

Route::group(['namespace' => 'Admin'], function () {
    Route::get('/',  'LoginController@adminLogin')->name('login');
    Route::get('login', 'LoginController@adminLogin')->name('login');
    Route::post('get-login', 'LoginController@adminGetLogin')->name('postLogin');
});

Route::group(['namespace' => "Admin"], function () {

    Route::group(['middleware' => 'auth'], function () {

        Route::controller(DashboardController::class)->group(function () {
            Route::get('dashboard', 'index')->name('dashboard');
        });

        Route::controller(LoginController::class)->group(function () {
            Route::get('logout', 'logout')->name('logout');
        });

        Route::controller(ProfileController::class)->group(function () {
            Route::get('profile', 'index')->name('profile.index');
        });

        Route::controller(CompanyController::class)->group(function () {
            Route::get('company-list', 'index')->name('company.list');
        });

        Route::controller(ContactController::class)->group(function () {
            Route::get('contact-list/{type?}', 'index')->name('contact.list');
        });
    });
});