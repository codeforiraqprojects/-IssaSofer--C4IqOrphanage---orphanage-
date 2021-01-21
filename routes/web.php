<?php

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

Route::get('/', 'HomeController@index');
Auth::routes();

Route::middleware('auth')->group(function() {
     Route::get('/myorphans', 'myorphanController@index');
     Route::post('/myorphans/{orphan}/{user}', 'myorphanController@story');
     Route::post('/myorphans/{id}', 'myorphanController@destroy');
     Route::resource('/orphans', 'orphansController');
     Route::get('/adopted', 'adoptedController@index');
     Route::post('/adopted/{id}', 'adoptedController@story');
});


Route::get('/home', 'HomeController@index');
Route::get('/contact-us', 'contactController@index');
Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');
Route::get('/orphans', 'orphansController@index');
Route::post('/callus', 'PagesController@postCallus');
