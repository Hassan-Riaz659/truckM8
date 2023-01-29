<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group([
        'middleware' => ['cors'],
    ], function ($router) {
Route::post('/user-login', 'AuthenticationController@login');
Route::post('/send-password-reset-email', 'AuthenticationController@sendPasswordResetMail');

Route::put('/register', 'AuthenticationController@register');

Route::get('/calculate-estimate', 'CompanyController@calculateEstimate');

Route::get('/check-existing-client/{name}', 'ClientController@checkExistingClient');

Route::get('/clients/{id}', 'ClientController@viewClients');
Route::put('/add-client', 'ClientController@addClient');
Route::put('/add-employee', 'ClientController@addEmployee');
Route::get('/get-calculated-employees/{id}', 'ClientController@getCalculatedEmployees');

Route::put('/compare-plans', 'ClientController@comparePlans');
Route::put('/filter-plans', 'ClientController@filterPlans');

});

