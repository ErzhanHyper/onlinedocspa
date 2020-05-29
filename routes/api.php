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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
// });


Route::post('/register', 'API\AuthController@register');
Route::post('/login', 'API\AuthController@login');

Route::get('/get_cities', 'API\CityController@get_cities');
Route::get('/get_clinics', 'API\ClinicController@get_clinics');
Route::get('/get_specialization', 'API\SpecializationController@get_specialization');
Route::get('/get_qualification', 'API\QualificationController@get_qualification');
Route::get('/get_category', 'API\CategoryController@get_category');

Route::post('/get_doctors', 'API\DoctorController@get_doctors');

Route::middleware('auth:api')->group(function () {
    Route::post('/logout', 'API\AuthController@logout');
    Route::get('/get-user', 'API\AuthController@getUser');
});
