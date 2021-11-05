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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/Registration', 'RegisterController@register');
Route::post('/Login', 'LoginController@login');
Route::post('/Logout', 'LoginController@logout');
Route::post('/UpdateUser', 'UpdateUserController@update');
Route::post('/createStation', 'StationController@create');
Route::post('/deleteStation', 'StationController@delete');
Route::post('/editStation','StationController@edit');
Route::get('/recordsInfo', 'RecordsController@view');
Route::get('/stationInfo', 'StationController@view');