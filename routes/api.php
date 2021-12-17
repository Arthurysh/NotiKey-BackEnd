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
Route::post('/updateUserList', 'UpdateUserController@updateList');
Route::post('/updateUserMobile', 'UpdateUserController@updateProfileMobile');
Route::post('/insertNotes', 'NotesController@insertNotes');
Route::post('/deleteNotes', 'NotesController@deleteNotes');
Route::post('/deleteCars', 'CarsController@deleteCars');
Route::post('/addCars', 'CarsController@addCars');
Route::post('/addUserToSystem', 'RegisterController@addUser');
Route::post('/addDiscount', 'DiscountController@addDiscount');
Route::post('/deleteDiscount', 'DiscountController@deleteDiscount');
Route::post('/upStatus', 'NotesController@upStatus');
Route::post('/downStatus', 'NotesController@downStatus');

Route::get('/notesInfo/{userId?}', 'NotesController@view');
Route::get('/stationInfo', 'StationController@view');
Route::get('/getUserList', 'UpdateUserController@getUsers');
Route::get('/getUserMobile/{userId?}', 'UpdateUserController@getUsersMobile');
Route::get('/getStatus', 'NotesController@getStatus');
Route::get('/getListStation', 'StationController@getList');
Route::get('/getListNameCars/{userId?}', 'CarsController@getList');
Route::get('/getServicesList', 'NotesController@getServices');
Route::get('/getTimeList', 'NotesController@getTime');
Route::get('/getUserCars/{userId?}', 'CarsController@getUserCars');
Route::get('/getDiscounts', 'DiscountController@getDiscountController');
Route::get('/getDiscount/{stationId?}', 'DiscountController@getDiscountManager');
Route::get('/getCarList', 'CarsController@getCarList');
Route::get('/getUsersList', 'UpdateUserController@getUsersList');
Route::get('/getListNotesUsers', 'NotesController@getListNotesUsers');
Route::get('/managerViewNotes/{stationId?}', 'NotesController@managerViewNotes');













