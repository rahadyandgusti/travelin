<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('search/get/city', 'HomeController@searchCity');
Route::get('search/','HomeController@search');

CRUD::resource('admin/province', 'ProvincesController');
CRUD::resource('admin/city', 'CitiesController');
CRUD::resource('admin/wisata', 'WisataController');
?>