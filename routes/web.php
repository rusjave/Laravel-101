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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['web']], function(){

	Route::resource('blog', 'BlogController@index');
	//more route will passed here

	Route::post('/editItem', 'BlogController@editItem');


	Route::post('/addItem', 'BlogController@addItem');


	Route::post('/deleteItem', 'BlogController@deleteItem');

});