<?php

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
Route::view('/{path?}', 'welcome');

// Route::get('/create-list', 'CompanyController@createList')->name('create-list');



/*Route::get('/pricing', function () {
    return view('landing.pricing');
})->name('pricing');

Route::get('/about', function () {
    return view('landing.about');
})->name('about');*/

/*Route::get('/user-dashboard', function () {
    return view('admin.index');
})->name('admin-dashboard');

Route::get('/profile-settings', function () {
    return view('admin.settings.index');
})->name('profile-settings');

Route::get('/new-quote-second-step', function () {
    return view('admin.quote.new-second');
})->name('new-quote-second-step');*/


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');
Route::get('/compare-plan', function () {
    return view('landing.compare_plan');
})->name('compare-plan');


/* Company Controller Routes */
Route::get('/healthcare-providers', 'CompanyController@index')->name('healthcare-providers');
Route::get('/companies', 'CompanyController@addCompany')->name('companies');
Route::post('/add-company', 'CompanyController@addCompanyPost')->name('add-company');
Route::post('/calculate-estimate', 'CompanyController@calculateEstimate')->name('calculate-estimate');
Route::get('/calculate-census', 'CompanyController@calculateCensus')->name('calculate-census');


/* Plan Controller Routes */
Route::get('/manage-plans', 'PlanController@managePlans')->name('manage-plans');
Route::get('/add-plan', 'PlanController@addPlan')->name('add-plan');
Route::post('/add-plan-details', 'PlanController@addPlanDetails')->name('add-plan-details');
Route::post('/update-plan-details', 'PlanController@updatePlanDetails')->name('update-plan-details');
Route::get('/edit-plan/{id}', 'PlanController@editPlan')->name('edit-plan');
Route::get('/view-plan/{id}', 'PlanController@viewPlan')->name('view-plan');

/* Quote Controller Routes */
/*Route::get('/new-quote', 'QuoteController@index')->name('new-quote');*/
Auth::routes();

