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
    Route::get('depart/{id}','CityController@getCities');
    Route::get('maps',function(){
      return view('admin.maps.list');
    });

});




    Route::get('/',function(){
        return view('e-comer._base.home.layout');
    });


