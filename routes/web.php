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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/loads','HomeController@showLoads')->name('showLoad');

Route::get('create/load','HomeController@createLoad')->name('createLoad');

Route::post('create/load','HomeController@store')->name('storeLoad');

Route::get('user/','HomeController@profile')->name('userProfile');

Route::post('user/profile',"HomeController@editProfile")->name('editProfile');

Route::get('edit/load/{id}',"HomeController@editLoad")->name('EditLoad');
Route::post('edit/load/{id}',"HomeController@storeEditLoad")->name('storeEditLoad');

Route::post('delete/{id}',"HomeController@deleteLoad")->name('loadDelete');


Route::get('vehicles','HomeController@showVehicles')->name('show.vehicles');
Route::post('vehicle/create','HomeController@createVehicle')->name('create.vehicle');
Route::get('vehicle/edit/{id}','HomeController@editVehicle')->name('edit.vehicle');
Route::post('vehicle/edit/{id}','HomeController@storeEditVehicle')->name('storeEditVehicle');

Route::get('drivers','HomeController@showDrivers')->name('show.drivers');
Route::get('drivers/create','HomeController@createDrivers')->name('create.drivers');
Route::post('drivers/create','HomeController@storeDrivers')->name('store.drivers');
Route::get('driver/edit/{id}','HomeController@editDriver')->name('edit.driver');
Route::post('drivers/edit/{id}','HomeController@storeEditDrivers')->name('store.EditDriver');






