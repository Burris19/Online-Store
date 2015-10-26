<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::group(['prefix' => 'admin','namespace' => 'Admin'], function () {
    Route::resource('products', 'ProductController');
    Route::resource('providers','ProviderController');
    Route::resource('typeEmployees','TypeEmployeeController');
    Route::resource('employees','EmployeeController');
    Route::resource('stores','StoreController');
    Route::resource('departments','DepartmentController');
    Route::resource('cars','CarController');
    Route::resource('sales','SaleController');
    Route::get('depart/{id}','CityController@getCities');
});

Route::group(['namespace' => 'Frontend'], function () {
    Route::get('/','FrontedController@index');
    Route::get('login','FrontedController@login');
    Route::get('register','FrontedController@register');
    Route::get('depart/{id}','FrontedController@getCities');
    Route::get('detail/{id}','FrontedController@getDetail');
    Route::get('shoppingCart','FrontedController@getShoppingCart');

});

Route::post('register','Auth\ClientsController@postRegister');
Route::post('login','Auth\ClientsController@postLogin');
Route::get('logout',[
    'uses' => 'Auth\ClientsController@getLogout',
    'as' => 'logout'
]);





