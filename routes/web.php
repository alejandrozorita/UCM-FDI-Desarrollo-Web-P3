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


Route::get('/', array('as' => 'index','uses' => 'HomeController@index'));





Route::group(array('prefix' => 'administrador'), function()
{
	Route::get('/', array('as' => 'index_admin','uses' => 'AdminController@index_admin'));
	Route::get('/autor/nuevo', array('as' => 'nuevo_autor','uses' => 'AdminController@nuevo_autor'));
});


Auth::routes();


