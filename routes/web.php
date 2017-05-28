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
	Route::post('/autor/nuevo', array('as' => 'nuevo_autor_post','uses' => 'AdminController@create_autor'));

	Route::get('/autor/editar/{autor_id}', array('as' => 'editar_autor','uses' => 'AdminController@editar_autor'));
	Route::post('/autor/editar', array('as' => 'editar_autor_post','uses' => 'AdminController@editar_autor_post'));

	Route::get('/autor/borrar/{autor_id}', array('as' => 'borrar_autor','uses' => 'AdminController@borrar_autor'));


});


Auth::routes();


