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



// Route::controller(AgentController::class)->group(function () {
//     Route::get('admin-agents', 'index')->name('admin-agents.index');
//     Route::get('agent-details/{id}', 'agentDetails')->name('agent.details');
// });

// Route::controller(PropertyController::class)->group(function () {
//     Route::any('investment-property-details/{id}', 'viewInvestmentPropertyDetails')->name('view.investment.property.details');
//     Route::any('view-investment-property-details/{id}', 'viewPropertyDetails')->name('view.property.details');
//     Route::get('/investment-property', 'investmentProperty');
//     Route::post('visitor-save-property-details', 'visitorSavePropertyDetails')->name('visitor.save.property.details');
// });

// Route::controller(DeveloperController::class)->group(function () {
//     Route::get('developer-details/{id}', 'developerDetails')->name('developer.details');
// });

// Route::controller(JournalController::class)->group(function () {
//     Route::get('/jurnal-details/{id}','journalDetails')->name('journal.details');
// });
 
Route::group(['namespace' => 'Admin'], function () {
    Route::get('/',  'LoginController@adminLogin')->name('login');
    Route::get('login', 'LoginController@adminLogin')->name('login');
    Route::post('get-login', 'LoginController@adminGetLogin')->name('postLogin');
});

Route::group(['namespace' => "Admin"], function () {

    Route::controller(PropertyController::class)->group(function () {
        Route::any('view-property-details/{id}', 'viewXMLPropertyDetails')->name('view.xml_property.details');

    });
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

        Route::controller(CategoryController::class)->group(function () {
            Route::get('category-list', 'index')->name('category.list');
        });

        Route::controller(ProductController::class)->group(function () {
            Route::get('product-list/{type?}', 'index')->name('product.list');
            Route::get('transactions/{type?}', 'transactions')->name('transactions.list');
        });

        Route::controller(ProjectController::class)->group(function () {
            Route::get('project-list', 'index')->name('project.list');
            Route::get('view-project/{id?}/{viewFlag?}', 'view')->name('view.project');
        });


    });
});