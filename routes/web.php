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

Route::get('/new', 'HomeController@indexNew');
Route::get('/', 'HomeController@index');
Route::get('search/get/city', 'HomeController@searchCity');
Route::get('search/','HomeController@search');
Route::get('wisata/{id}','HomeController@getWisata');

$s = 'social.';
Route::get('/social/redirect/{provider}',   ['as' => $s . 'redirect',   'uses' => 'Auth\SocialController@getSocialRedirect']);
Route::get('/social/handle/{provider}',     ['as' => $s . 'handle',     'uses' => 'Auth\SocialController@getSocialHandle']);

/*ajax*/
Route::get('api/home/slide-list','HomeController@getSliderCover');
Route::get('api/home/city-list','HomeController@getCityList');
Route::get('api/home/viewed-list','HomeController@getViewedList');
Route::get('api/home/rated-list','HomeController@getRatedList');

CRUD::resource('admin/province', 'ProvincesController');
CRUD::resource('admin/city', 'CitiesController');
CRUD::resource('admin/wisata', 'WisataController');
CRUD::resource('admin/categories', 'CategoriesController');
?>