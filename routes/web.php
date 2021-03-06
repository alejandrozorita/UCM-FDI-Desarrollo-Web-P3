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

Route::get('/noticia/{noticia_slug}', array('as' => 'leer_noticia','uses' => 'HomeController@leer_noticia'));
Route::get('/noticias/categoria/{categoria_slug}', array('as' => 'ver_noticias_categoria','uses' => 'HomeController@ver_noticias_categoria'));

Route::post('/comentario/nuevo', array('as' => 'nuevo_comentario','uses' => 'ComentariosController@nuevo_comentario'));






Auth::routes();

Route::group(array('prefix' => 'administrador'), function()
{
	Route::get('/', array('as' => 'index_admin','uses' => 'AdminController@index_admin'));
	
	Route::get('/autor/nuevo', array('as' => 'nuevo_autor','uses' => 'AdminController@nuevo_autor'));
	Route::post('/autor/nuevo', array('as' => 'nuevo_autor_post','uses' => 'AdminController@create_autor'));

	Route::get('/autor/editar/{autor_id}', array('as' => 'editar_autor','uses' => 'AdminController@editar_autor'));
	Route::post('/autor/editar', array('as' => 'editar_autor_post','uses' => 'AdminController@editar_autor_post'));

	Route::get('/autor/borrar/{autor_id}', array('as' => 'borrar_autor','uses' => 'AdminController@borrar_autor'));

	Route::post('/establecer-orden-noticias', array('as' => 'establecer_orden_noticias','uses' => 'NoticiasController@establecer_orden_noticias'));
	Route::get('/quitar-noticia-destacada/{noticia_id}', array('as' => 'quitar_noticia_destacada','uses' => 'NoticiasController@quitar_noticia_destacada'));
	
});


Route::group(array('prefix' => 'autor'), function()
{
	Route::get('/', array('as' => 'index_autor','uses' => 'AutoresController@index_autor'));
	
	Route::get('/noticia/nueva', array('as' => 'noticia_nueva','uses' => 'AutoresController@noticia_nueva'));
	Route::post('/noticia/nueva', array('as' => 'noticia_nueva_post','uses' => 'AutoresController@noticia_nueva_post'));

	Route::get('/noticia/editar/{noticia_id}', array('as' => 'editar_noticia','uses' => 'AutoresController@editar_noticia'));
	Route::post('/noticia/editar/', array('as' => 'editar_noticia_post','uses' => 'AutoresController@editar_noticia_post'));

	Route::get('/noticia/borrar/{noticia_id}', array('as' => 'borrar_noticia','uses' => 'NoticiasController@borrar_noticia'));

});




